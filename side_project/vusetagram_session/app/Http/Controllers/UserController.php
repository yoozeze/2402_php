<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        // 유효성 검사
        $validator = Validator::make(
            $request->only('account', 'password')
            ,[
                'account' => ['required', 'min:4', 'max:20','regex:/^[a-zA-Z0-9]+$/']
                ,'password' => ['required', 'min:4', 'max:20','regex:/^[a-zA-Z0-9]+$/']
            ]
        );

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            // 두번째 파라미터는 배열형태여야해서 toArray 사용
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 유저 정보 획득
        $userInfo = User::select('users.*')
                            ->selectSub(function($query) {
                                // 데이터베이스에 데이터라것을 인식시켜야해서 DB 씀
                                $query->select(DB::raw('count(*)'))
                                        ->from('boards')
                                        // whereColumn 두컬럼을 비교
                                        ->whereColumn('users.id', 'boards.user_id');
                            }, 'boards_count')
                            ->where('account', $request->account)
                            ->first();

        // 유저 정보 없음
        if(!isset($userInfo)) {
            // 유저 없음
            throw new MyAuthException('E20');
        } else if(!(Hash::check($request->password, $userInfo->password))) {
            // 비밀번호 오류
            throw new MyAuthException('E21');
        }

        // 로그인 처리
        Auth::login($userInfo);  // 유저 정보 획득의 userInfo

        // 레스폰스 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => '로그인 성공'
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200)->cookie('auth', '1', 120, null, null, false, false);
    }

    public function logout() {
        Log::debug('로그아웃 유저 확인', );
        // 로그아웃
        Auth::logout(Auth::user());
        Session::invalidate(); // 기본 세션 파기하고 새로운 세션 생성
        Session::regenerateToken(); // CSRF 토큰 재발급

        $responseData = [
            'code' => '0'
            ,'msg' => '로그아웃 완료'
        ];

        return response()->json($responseData, 200)
                        ->cookie('auth', '1', -1, null, null, false, false);
    }
}
