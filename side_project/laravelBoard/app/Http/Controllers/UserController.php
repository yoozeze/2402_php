<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function login(Request $request) {
        // 유효성 검사 2가지 방법

        // 1.
        $request->validate([
            // 2가지 방법
            // 'email' => 'required|email|max:50'
            'email' => ['required', 'email', 'max:50']
            ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
            // 유효성 검사를 했을때 부적합하면 전 페이지로 이동(ex. login페이지)
        ]);

        // 2.
        // validator 객체 생성으로 체크하는 방법(자동으로 이전 페이지로 이동x)
        // 개발자의 의도에 따라 로직 작성이 용이
        // $validator = Validator::make(
        //     $request->only('email', 'password')
        //     ,[
        //         'email' => ['required', 'email', 'max:50']
        //         ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
        //     ]
        // );

        // if($validator->fails()) {
        //     1.
        //     foreach($validator->errors()->all() as $error) {
        //         echo $error.'<br>';
        //     }

        //     2.
        //     return redirect()
        //             ->route('get.login')
        //             ->withErrors($validator->errors());
        // }
        // return 'test';

        // --------------------------------------------------------------------------------
        // 유저 정보 습득
        $resultUserInfo = User::where('email', $request->email)->first();

        // 회원 정보 체크
        $errorMsg = '';
        if(is_Null($resultUserInfo)) {
            // 회원 존재 여부 체크
            $errorMsg = '존재하지 않는 회원입니다.';
        } else {
            // 비밀번호 일치 체크
            if(!(Hash::check($request->password, $resultUserInfo->password))) {
                $errorMsg = '비밀번호가 일치하지 않습니다.';
            }
        }
        // 회원 정보 예외 발생시 로그인 페이지로 리다이렉트
        if($errorMsg !== '') {
            return redirect()->route('get.login')->withErrors($errorMsg);
        }
        // return var_dump($resultUserInfo);

        // ----------------------------------------------------------------------------------
        // 유저 인증 처리
        Auth::login($resultUserInfo);
        // return Auth::user();

        // return Auth::id(); : 로그인한 유저 pk 획득
        // return Auth::user(); : 로그인한 유저 정보 획득
        // return Auth::check(); : 현재 로그인 중인지 체크

        return redirect()->route('board.index');
    }

    // 로그아웃 처리
    // 방법1: Session 객체 이용
    public function logout() {
        Auth::logout(); // 로그아웃 실행됨
        
        Session::invalidate(); // 기존 세션의 모든 데이터 제거하고 새로운 세션 ID 발급
        Session::regenerateToken(); // CSRF 토큰 재발급

        return redirect()->route('get.login');
    }

    // 방법2
    // public function logout(Request $request) {
    //     Auth::logout(); // 로그아웃 실행됨
        
    //     // Request 객체의 Session 메소드 이용
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    // }
    
}
