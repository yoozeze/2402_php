<?php

// include2 에 있는 함수를 사용하기전에 호출먼저 
include("./070_include2.php");
echo my_sum(1, 2)."\n";
echo "include1";

// 파일을 딱 한번만 불러옴
include_once("./070_include2.php");
include_once("./070_include2.php");

