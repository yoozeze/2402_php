<?php

namespace controller;

use model\BoardsnameModel;

class Controller {
    // 에러 메세지 프로퍼티
    protected $arrErrorMsg = []; // 화면에 표시할 에러 메세지 리스트

    protected $arrBoardsNameInfo = []; // 헤더 게시판 드롭다운 리스트

    protected $boardName = ""; // 게시판 이름

    // 비로그인시 접속 불가능한 URL 리스트
    private $arrNeedAuth = [
        "board/list"
        ,"board/add"
        ,"board/detail"
        ,"board/delete"
        ,"user/updateUser"
    ];
    
    // 생성자
    public function __construct($action) {
        
        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // 헤더 드롭다운 리스트 획득 및 게시판 이름 설정
        $modelBoardsname = new BoardsnameModel();
        $this->arrBoardsNameInfo = $modelBoardsname->getBoardsnameList();
        $modelBoardsname->destroy();

        // 해당 action 호출
        $resultAction = $this->$action();

        // view 호출 -> TODO
        // require_once("view/".$resultAction);
        $this->callView($resultAction);

        exit; // php 처리 종료

    }

    // 뷰 OR 로케이션 처리용 메소드
    private function callView($path) {
        if(strpos($path, "Location:") === 0) {
            header($path);
        } else {
            require_once("view/".$path);
        }
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"]; // 접속 url 획득

        // 접속 권한이 없는 페이지 접속 차단
        if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth)) {
            header("Location: /user/login");
            exit;
        }

        // 로그인한 상태에서 로그인 페이지 접속시 board/list로 이동
        if(isset($_SESSION["u_id"]) && $url === "user/login") {
            header(("Location: /board/list"));
            exit;
        }
    }
}