<?php

namespace App\Http\Controllers;

use MyToken;
use MyUserValidate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\MyAuthException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\MyValidateException;
use App\Utils\MyToken as UtilsMyToken;

class UserController extends Controller
{
    public function login(Request $request) {
        // debug 가장낮은 레벨
        Log::debug('Start login', $request->all());

        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
        ];

        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패 처리
        if($resultValidate->fails()) {
            Log::debug('login validation Error', $resultValidate->errors()->all());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)
                                    ->withCount('boards')
                                    ->first();

        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');
        }

        // 토큰 발행
        // accessToken : 권한 체크, 제한시간이 1시간이내
        // refreshToken : 인증 체크, 제한시간이 2주이내, accessToken이 만료되면서 refreshToken도 재발급(일회용)
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        return response()->json($responseData, 200);
    }

    /**
     * 로그아웃 처리
     *  
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function logout(Request $request) {
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');

        $userInfo = User::find($id);

        MyToken::removeRefreshToken($userInfo);

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200);
    }

}