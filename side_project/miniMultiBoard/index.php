<?php

// 엔트리포인트

// 설정 파일 불러오기
require_once("config.php");
// echo _ROOT;

// require_once("router/Router.php");
// 오토로드 호출
require_once("autoload.php");


// 라우터 호출
new router\Router();

// $Router = new router\Router();
// $Router->test();