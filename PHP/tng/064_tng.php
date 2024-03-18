<?php

// 로또 번호 생성기
// 1~45 까지 랜덤한 숫자를 6개 뽑습니다.
// 단, 중복되는 숫자는 없어야 합니다.

$num1 = random_int(1, 45);
$num2 = random_int(1, 45);
$num3 = random_int(1, 45);
$num4 = random_int(1, 45);
$num5 = random_int(1, 45);
$num6 = random_int(1, 45);
echo $num1,"\n", $num2,"\n", $num3,"\n"
    , $num4,"\n", $num5,"\n", $num6,"\n";

// $num = random_int(1,45);
// foreach ($num as $key => $val){
//     $num_pick = [];
//     if(){
//         $num_pick = $num;
//         unset($num[$key]);
//     }
// }

// $num = random_int(1, 45);
// foreach($num as $num_pick){
//     array_unique($num_pick);
//     echo $num_pick;
// }

// 방법1
$arr_pick = []; // 뽑은 값 저장용
while(true){
    $int_rand = random_int(1, 25); // 랜덤 숫자 획득

    // 중복 체크
    if(!isset($arr_pick[$int_rand])){
        $arr_pick[$int_rand] = $int_rand;
    }

    // 루프 종료 체크
    if(count($arr_pick) === 6){
        break;
    }
}
print_r($arr_pick);

// 방법2
$arr_base = range(1, 45); // 기본 배열
$arr_pick =[]; // 뽑은 값 저장용
for($i = 0; $i < 6; $i++){
    $int_rand = random_int(0, count($arr_base)-1); // 랜덤 숫자 획득(배열의 키)
    $arr_pick[] = $arr_base[$int_rand]; // 랜덤한 값 저장
    unset($arr_base[$int_rand]);
    $arr_base = array_values($arr_base); // 배열 인덱스 정렬
}
print_r($arr_pick);

// 방법3
$arr_base = range(1, 45); // 기본 배열
shuffle($arr_base); // 배열 섞기
$result = array_slice($arr_base, 0, 6); // 배열 키 0~6까지 가져오기
print_r($result);
