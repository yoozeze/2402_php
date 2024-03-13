<?php

// 변수 Variable
$str = "안녕 php";
echo $str;

// 한글로도 설정이 가능하나, 사용 X
$숫자1 = 1;
echo $숫자1;

$num1 = 1;
echo $num1;

$user_name;

$Num = 1;
$num = 2;
echo $Num, $num;

// 네이밍 기법
// 스네이크 기법
$user_name;

// 카멜 기법
$userName;

echo "\n";
//상수 : 절대 변하지 않는 값
$num = 1;
$num = 2;

define("USER_AGE", 20);

define("USER_AGE", 30);  // 이미 선언된 상수이므로 워닝 일어나고 값이 바뀌지 않음
echo USER_AGE;

// 점심메뉴
// 탕수육 9000원
// 햄버거 10000원
// 빵 2000원
echo "\n";

$menu = "점심메뉴";
$tang = "탕수육 9000원";
$ham = "햄버거 10000원";
$bre = "빵 2000원";

echo $menu;
echo "\n";
echo $tang;
echo "\n";
echo $ham;
echo "\n";
echo $bre;
echo "\n";

$menu = "점심메뉴\n";
$tang = "탕수육 9000원\n";
$hamberger = "햄버거 10000원\n";
$bbang = "빵 2000원\n";
echo $menu, $tang, $hamberger, $bbang;

echo "\n";
$num4 = 2000;
echo "햄버거" . ($num4 * 5);

// 스왑
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$tmp = "";
$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;
echo $swap1, $swap2;