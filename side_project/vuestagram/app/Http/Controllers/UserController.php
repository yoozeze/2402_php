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

class UserController extends Controller
{
    /**
     * 로그인 처리
     */

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

    /**
     * 토큰 재발급
     * 
     * @param Illuminate\Http\Request $requset
     * 
     * @return response() json
     */
    public function reissue(Request $request) {
        Log::debug('***** 토큰 재발급 시작 *****');

        // 유저 PK 획득
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        Log::debug('베어럴 토큰 : ' .$request->bearerToken());
        Log::debug('유저 PK : ' .$id);

        // 유저 정보 획득
        // DB에서 바로 가져오기
        // DB::select('select * from users where id = ?', $id);

        $resultUserInfo = User::find($id);
        Log::debug('유저 정보 : ', $resultUserInfo->toArray());

        // 유효한 유저 확인
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }
        Log::debug('유효한 유저 확인 완료');

        // 리프래시 토큰 체크
        if($request->bearerToken() !== $resultUserInfo->refresh_token) {
            throw new MyAuthException('E23');
        }
        Log::debug('리프래시 토큰 체크 완료');

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('토큰 발행 완료');

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('토큰 저장 완료');

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];

        Log::debug('***** 토큰 재발급 완료 *****');
        return response()->json($responseData, 200);
    }


    /**
     * 회원가입 처리
     *  
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     * 
     */

    public function regist(Request $request) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
            ,'gender' => $request->gender
            ,'name' => $request->name
            ,'profile' => $request->profile
        ];

        // 유효성 체크
        $validator = MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // insert 데이터 생성
        $insertData = $request->only('account', 'password', 'name', 'gender', 'profile');
        $insertData['password'] = Hash::make($insertData['password']);
        $filePath = $request->file('img')->store('img');
        $insertData['img'] = '/'.$filePath;

        // insert 처리
        $newUser = User::create($insertData);

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('토큰 발행 완료');

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('토큰 저장 완료');

        // response 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => '인증완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $newUser
        ];

        return response()->json($responseData, 200);
    }
}
