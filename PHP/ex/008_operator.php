<?php

// 산술 연산자
// 사칙연산 나머지를 구하는 연산자
$num1 = 10;
$num2 = 8;

// 더하기
$sum = $num1 + $num2;
echo $sum, "\n";

// 빼기
$minus = $num1 - $num2;
echo $minus, "\n";

// 곱하기
$multi = $num1 * $num2;
echo $multi, "\n";

// 나누기
$division = $num1 / $num2;
echo $division, "\n";

// 나머지
$remainder = $num1 % $num2;
echo  $remainder, "\n";


// 산술 대입 연산자
// 더하기
$num = 10;
$num = $num + 10;
$num += 10;
echo $num;
// 빼기
$num = $num - 5;
$num -= 5;
// 곱하기
$num = $num * 2;
$num *= 2;
// 나누기
$num = $num / 2;
$num /= 2;
// 나머지
$num = $num % 3;
$num %= 3;

// 문자열 연결
$str1 = "안녕";
$str1 = $str1."하세요";
$str1 .= "하세요";
echo $str1, "\n";


// 산술 대입 연산자로 프로그램을 만들어 주세요.
// 아래 과정을 실행해 주세요.
// 출력 포맷은 "현재 tng_num의 값 : 계산한값"으로 출력
// 예) 현재 tng_num의 값 : 20
// 각 과정마다 출력

$tng_num = 100;
// $base_str = "현재 tng_num의 값 : "; -> 수정할때 더 편함 변수 설정을 적극 활용

// $tng_num에 10을 더해주세요.
$tng_num += 10;
echo "현재 tng_num의 값 : ".$tng_num."\n";
// $tng_num에 5로 나누어주세요.
$tng_num /= 5;
echo "현재 tng_num의 값 : ".$tng_num."\n";
// $tng_num에 4를 빼주세요
$tng_num -= 4;
echo "현재 tng_num의 값 : ".$tng_num."\n";
// $tng_num를 7로 나눈 나머지를 구해주세요
$tng_num %= 7;
echo "현재 tng_num의 값 : ".$tng_num."\n";
// $tng_num에 3을 곱해주세요.
$tng_num *= 3;
echo "현재 tng_num의 값 : ".$tng_num."\n";

$tng_num = 100;
$base_str = "현재 tng_num의 값 : ";

// $tng_num에 10을 더해주세요.
$tng_num += 10;
echo $base_st.(string)$tng_num."\n";
// $tng_num에 5로 나누어주세요.
$tng_num /= 5;
echo $base_st.(string)$tng_num."\n";
// $tng_num에 4를 빼주세요
$tng_num -= 4;
echo $base_st.(string)$tng_num."\n";
// $tng_num를 7로 나눈 나머지를 구해주세요
$tng_num %= 7;
echo $base_st.(string)$tng_num."\n";
// $tng_num에 3을 곱해주세요.
$tng_num *= 3;
echo $base_st.(string)$tng_num."\n";


// 비교 연산자
// 변수1 > 변수2 : 변수1이 변수2보다 크다
var_dump( 1 > 2 );
var_dump( 3 > 2 );
// 변수1 < 변수2 :변수1은 변수2보다 작다
var_dump( 1 < 2 );
var_dump( 3 < 2 );
// 변수1 >= 변수2 : 변수1이 변수2보다 크거나 같다
var_dump( 1 >= 1 );
var_dump( 1 >= 2 );
var_dump( 1 >= 0 );
// 변수1 <= 변수2 : 변수1이 변수2보다 작거나 같다.
var_dump( 1 <= 1 );
var_dump( 1 <= 2 );
var_dump( 1 <= 0 );
// 변수1 == 변수2 : 변수1과 변수2가 같다. 불완전 비교 (데이터 타입 체크 X)
var_dump( 1 == 1 );
var_dump( 1 == "1" );
// 변수1 === 변수2 : 변수1과 변수2가 같다. 완전 비교 (데이터 타입 체크 O)
var_dump( 1 === 1 );
var_dump( 1 === "1" );
var_dump( 1 === (int)"1" );
// 변수1 != 변수2 : 변수1과 변수2가 같지 않다. 불완전 비교 (데이터 타입 체크 X)
var_dump( 1 != 1 );
var_dump( 1 != "1" );
// 변수1 !== 변수2 : 변수1과 변수2가 같지 않다. 완전 비교 (데이터 타입 체크 O)
var_dump( 1 !== 1 );
var_dump( 1 !== "1" );

// 논리 연산자
// and 연산자 (&&) : 조건이 모두 만족하면 true, 하나라도 틀리면 false
var_dump( 1 === 1 && 1 === 2 );
var_dump( 1 === 1 && 2 === 2 );
// or 연산자 (||) : 조건 중 하나라도 만족하면 true, 모두 틀리면 false
var_dump( 1 === 1 || 2 === 2 );
var_dump( 1 === 1 || 1 === 2 );
var_dump( 1 === 3 || 1 === 2 );
// not 연산자 (!) : 연산의 결과를 반전
var_dump( !(1 === 1) );
var_dump( !(1 === 2) );