<?php

namespace controller;

class Controller {
    
    // 생성자
    public function __construct($action) {
        
        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크 -> TODO

        // 해당 action 호출
        $resultAction = $this->$action();

        // view 호출 -> TODO
        require_once("view/".$resultAction);

        exit; // php 처리 종료

    }
}