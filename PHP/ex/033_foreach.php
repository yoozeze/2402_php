<?php

// foreach 문 : 배열을 루프하는데 특화된 반복문, 배열의 길이만큼 루프
$arr = [9,8,7,6,5];

// 배열의 값만 이용할 경우
foreach($arr as $val){ // $val 루프의 값을 저장
    echo $val."\n";
}

// 배열의 키와 값 모두 이용할 경우
foreach($arr as $key => $val){
    echo "key : $key, value: $val\n";
}

$arr =[
    ["name" => "홍길동","age" => 20 ,"gender" => "남자"]
    ,["name" => "갑순이","age" => 20 ,"gender" => "여자"]
    ,["name" => "갑돌이","age" => 30 ,"gender" => "남자"]
];
$msg_fomat = "<h3>%s</h3>의 나이는 %d이고, 성별은 %s입니다.<br>";
// name의 나이는 age이고, 성별은 gender입니다.
foreach($arr as $item){
    echo $item["name"]. "의 나이는 " .$item["age"]. "이고, 성별은 " .$item["gender"]. "입니다.\n";
}

$arr2=[
    "name" => "홍길동"
    ,"age" => "20" 
    ,"gender" => "남자"
];
// 아래의 배열에서 foreach를 이용해 아래처럼 출력해 주세요.
// ID List
// meerkat1
// meerkat2
// meerkat3
$arr = [
	["id" => "meerkat1", "pw" => "php504"]
	,["id" => "meerkat2", "pw" => "php504"]
	,["id" => "meerkat3", "pw" => "php504"]
];
echo "ID List\n";
foreach($arr as $item){
    echo $item["id"]."\n";
}
// 배열의 값중 가장 큰 수를 구해주세요.
// 예시)
// $arr = [4,5,7,10,3,2,9];
// 위의 배열 중 가장 큰 수인 10가 출력 되어야 합니다.
$arr1 = [4,5,7,10,3,2,9];
$tmp_max = 0;
$tmp_min = $arr[0];
foreach($arr1 as $val1){
    if($tmp_max < $val1){
        $tmp_max = $val1;
    }
    if($tmp_min > $val1){
        $tmp_min = $val1;
    }
}
echo $tmp_max;
echo $tmp_min;

// 초기화 값 기준
$tmp_num = 0;
$tmp_str = "";
$tmp_arr = [];
$tmp_object = null;
