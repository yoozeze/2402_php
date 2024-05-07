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

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

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
    protected function logoutGet() {
        // session_unset(); // 해당키만 삭제
        session_destroy(); // session 전체 삭제

        return "Location: /user/login";
    }

    // 회원 가입 페이지 이동
    protected function registGet() {
        return "regist.php";
    }

    // 회원 가입 처리
    protected function registPost() {
        $requestData = [
            "u_email"   => $_POST["u_email"]
            ,"u_pw"     => $_POST["u_pw"]
            ,"u_name"   => $_POST["u_name"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "regist.php";
        }

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 이메일 중복 체크
        $selectData = [
            "u_email" => $requestData["u_email"]
        ];

        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($selectData);

        if(count($resultUserInfo) > 0) {
            $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            return "regist.php";
        }

        // 회원 정보 insert 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->addUserInfo($requestData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        } else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원가입에 실패했습니다."];
            return "regist.php";
        }
        return "Location: /user/login";   
    }

    // 이메일 체크 처리
    protected function chkEmailPost() {
        // 유저 입력 데이터 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
        ];

        // response 데이터 초기화
        $responseArr = [
            "errorFlg" => false
            ,"errorMsg" => ""
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
        } else {
            // 이메일 중복 체크
            $modelUsers = new UsersModel();
            $resultUserInfo = $modelUsers->getUserInfo($requestData);
    
            if(count($resultUserInfo) > 0) {
                $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            }
        }

        // response 데이터 셋팅
        if(count($this->arrErrorMsg) > 0) {
            $responseArr["errorFlg"] = true;
            $responseArr["errorMsg"] = $this->arrErrorMsg;
        }

        // response 처리
        header('Content-type: application/json');
        echo json_encode($responseArr);
        exit;
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw, $email) {
        return base64_encode($pw.$email); // 숫자를 던져 주면 64글자로 암호화해줌
    }

    // 회원 정보 수정 페이지
    protected function updateUserGET() {
        $requestData = [
            "u_id" => $_SESSION["u_id"]
        ];
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);
        $_SESSION['u_name'] = $resultUserInfo;

        // var_dump($_SESSION);
        return "updateUser.php";
    }

    // 회원 정보 수정
    protected function updateUserPost() {
        $requestData = [
            "u_id" => $_SESSION["u_id"]
        ];

        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        $requestData = [
            "u_id"      => $_SESSION["u_id"]
            ,"u_pw"     => $_POST["u_pw"]
            ,"u_name"   => $_POST["u_name"]
        ];

        $chekedData = [
            "u_pw"     => $_POST["u_pw"]
            ,"u_name"   => $_POST["u_name"]
            ,"chk_u_pw" => $_POST["chk_u_pw"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($chekedData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "updateUser.php";
        }

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $resultUserInfo["u_email"]);

        // 회원 정보 update 처리
        $modelUsers->beginTransaction();
        $resultUserUpdate = $modelUsers->updateUser($requestData);

        if($resultUserUpdate === 1) {
            $modelUsers->commit();
            return "Location: /board/list";
        } else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원수정에 실패했습니다."];
            return "updateUser.php";
        }
        var_dump($requestData);
        return "Location: /user/updateUser";
    }

}


    // 회원 정보 리스트
    // protected $arrUserList = []; 

    // protected function getUserList() {
    //     $requestData = [
    //         "u_id" => $_SESSION["u_id"]
    //         ,"u_name" => $_POST["u_name"]
    //     ];

    //     $modelUsers = new UsersModel();
    //     $this->arrUserList = $modelUsers->getUserList($requestData);

    //     $modelUsers->destroy();

    //     return "updateUser.php";
    // }