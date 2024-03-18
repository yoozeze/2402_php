<?php

// 함수 정의
function my_sum($num1, $num2){
    return $num1 + $num2;
}
// 함수 호출
echo my_sum(32, 54)."\n";

// 파라미터 default 설정 
// 첫번째 파라미터에는 default 설정 안함 아규먼트에 값을 넣을 수 없기 때문에 default 정한 파라미터는 뒤로 보냄

// 주석 작성 법 (작성해주는 습관!)
/**
 * 두 숫자를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, default 10
 * @return int 합계
 */
function my_sum2(int $num1, int $num2 = 10){
    return $num1 + $num2;
}
echo my_sum2(5, 4)."\n";
echo my_sum2(5)."\n";

// -, *, /, %를 해주는 각각의 함수를 만들어 주세요.

function my_minus(int $num1, int $num2){
    return $num1 - $num2;
}
function my_multi(int $num1, int $num2){
    return $num1 * $num2;
}
function my_division(int $num1, int $num2){
    return $num1 / $num2;
} // 나눌값으로 0 넣으면 안됨
function my_remainder(int $num1, int $num2){
    return $num1 % $num2;
} // 나눌값으로 0 넣으면 안됨
echo my_minus(5, 4)."\n";
echo my_multi(5, 4)."\n";
echo my_division(5, 4)."\n";
echo my_remainder(5, 4)."\n";


// 변수 이름 같다고해서 같은 변수가 아님
// function안에서 변수를 정의 하면 메모리를 따로 저장
function test(string $str){
    $str = "test()에서 변경";
}
function test2(string $str){
    $str = "test2()에서 변경";
    return $str;
}
$str ="처음 정의";
$str = test2($str);
echo($str);
test($str);

// 가변 길이 파라미터 -> 파라미터의 데이터 타입은 배열
function my_sum_all(...$numbers){
    // $numbers = func_get_arg(); PHP 5.5 이하
    print_r($numbers);
}
my_sum_all(3, 5, 2);

// 파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요.
function my_sum_all1(...$numbers){
    // 합계 저장용 변수
    $val_max = 0; // 초기화값은 루프안에 넣지 않음
    // 파라미터 루프해서 값을 획득 후 더하기
    foreach($numbers as $val){
        $val_max += $val;
    }
    // 합계 리턴
    return($val_max); // 루프안에 넣으면 루프가 종료됨
}
echo my_sum_all1(3, 5, 2)."\n";

// 참조 전달
function test_v($num){
    $num = 3;
}
function test_r(&$num){
    $num = 5;
}
$num = 0;
test_v($num);
test_r($num);
echo $num."\n";

// 참조 변수
$a = 1;
$b = &$a;
$a = 3;

echo $b;