<?php

include_once("./Whale.php");
include_once("./Shark.php");
include_once("./namespace/Shark.php");

// use : namespace를 이용해서 특정 클래스를 지정
// 별칭을 줄수도 있음(선택), 별칭 사용시 무조건 별칭으로 사용
use php\ex\Shark as ExShark;
use php\ex\namespace\Shark as NamespaceShark;

$obj = new ExShark("죠스");
$obj->swim("백상아리 ");
$obj = new NamespaceShark();
$obj->test();