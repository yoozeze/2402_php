<?php

namespace controller;

use model\UsersModel;
use lib\UserValidator;

class UserController extends Controller { // extends 상속
    // 로그인 페이지로 이동
    protected function loginGet() {
        return "login.php";
    }

    // 로그인 처리
    protected function loginPost() {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "login.php";
        }

        // 유저정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 여부 체크
        if(empty($resultUserInfo)) {
            // 에러메세지
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }

        // 세션에 u_id 저장
        // $_SESSION["u_id"] 유저가 로그인에 성공했을때만 세팅됨
        $_SESSION["u_id"] = $resultUserInfo["u_id"];
        
        // 로케이션 처리
        // TODO 보드 리스트 게시판 타입 수정할때 같이 수정
        return "Location: /board/list";
    }

    // 로그아웃 처리
    public function logoutGet() {
        // session_unset(); // 해당키만 삭제
        session_destroy(); // session 전체 삭제

        return "Location: /user/login";
    }
}