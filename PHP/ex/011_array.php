<?php

// 배열 array
// 하나의 변수에 여러개의 값을 담을 수 있는 데이터 타입
$arr1 = array(1, 2, 3); // 5.4 이전에 배열을 선언하던 방식
print_r($arr1);

$arr2 = [4, 5, 6]; //5.4 버전에 추가된 배열 선언 방식
print_r($arr2);

// 배열에서 특정 요소의 값 획득
// [key / index]라고 부름
echo $arr2[2];

// 배열에 요소(item) 추가
$arr2[] = 100;
print_r($arr2); 

// 배열의 특정 요소의 값 변경
$arr2[1] = 300;
print_r($arr2);

// 음식종류 5개 이상을 인덱스 배열로 만들어주세요.
$food = ["김밥", "돈까스", "치킨", "떡볶이", "제육볶음"];
echo $food[2], $food[3];
echo "\n";
$arr_food = [
    "돈까스"
    ,"규카츠"
    ,"히레카츠"
    ,"로스카츠"
    ,"토마호그카츠"
];
echo $arr_food[3];

// 연관 배열 Associative Array
$arr_asso = [
    "name" => "홍길동"
    ,"age" => 20
];
print_r($arr_asso);
echo $arr_asso["name"];

// $arr_asso 키(gender), 값(여자)인 아이템을 추가
$arr_asso["gender"] = "여자";
print_r($arr_asso);

// 다차원 배열 Multidimensional Array
// 2차원
$arr_multi = [
    [1, 2, 3]
    ,[4, 5, 6]
    ,7
];
echo $arr_multi[0][1];
echo $arr_multi[2];

// 3차원
$arr_multi = [
    [1, 2, 3]
    ,[
        4
        ,[10, 11, 12]
        ,6
    ]
    ,7
];
echo $arr_multi[0][1];
echo $arr_multi[2];
echo $arr_multi[1][1][1];

$arr_result =[
    ["name" => "홍길동", "age" => 20]
    ,["name" => "갑돌이", "age" => 99]
    ,["name" => "갑순이", "age" => 15]
];
echo $arr_result[1]["name"];
echo $arr_result[2]["age"];
echo "\n";

// 배열의 길이
$arr = [1, 2, 3, 4, 5];
echo count($arr);
echo count($arr_result);
echo "\n";

// unset() : 배열의 특정 아이템 삭제
// 삭제 후 숫자 정렬 X 
unset($arr[2]);
print_r($arr);

unset($arr_multi[1][1]);
print_r($arr_multi);

// 배열의 정렬
// asort() : 배열의 값을 기준으로 오름차순 정렬
$arr = [5, 4, 3, 8, 1];
asort($arr);
print_r($arr);

// arsort() : 배열의 값을 기준으로 내림차순 정렬
arsort($arr);
print_r($arr);

// ksort() : 배열의 키를 기준으로 오름차순 정렬
ksort($arr);
print_r($arr);

// krsort() : 배열의 키를 기준으로 내림차순 정렬
krsort($arr);
print_r($arr);

// 키는 요리명, 값은 주재료 하나 로 인루어진 배열을 만들어주세요.(배열 길이는 4)
$arr_food = [
    "떡볶이" => "떡"
    ,"치킨" => "닭"
    ,"김치볶음밥" => "김치"
    ,"팟타이" => "쌀면"
];
print_r($arr_food);

// 피자의 주재료를 밀가루, 토마토, 치즈, 바질
$arr_food = [
    "떡볶이" => "떡"
    ,"치킨" => "닭"
    ,"피자" =>"치즈"
    ,"팟타이" => "쌀면"
];
print_r($arr_food);

$arr_food["피자"]=["밀가루","토마토","치즈","바질"];
print_r($arr_food);

