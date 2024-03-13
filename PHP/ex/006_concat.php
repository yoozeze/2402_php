<?php

// 연결 연산자
$str1 = "안녕, ";
$str2 = "php!!";
$num = 111;
echo $str1.$str2.(string)$num;
echo "\n";
// 출력 : "안녕, 하세요!~"
$str1 = "안녕";
$str2 = "하세요!";
echo $str1.", ".$str2."~";
