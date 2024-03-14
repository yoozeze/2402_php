<?php

// switch
$food = "피자";
switch($food){
    case "김밥":
        echo "한식";
        break;
    case "햄버거":
    case "피자":
        echo "양식";
        break;
    default:
        echo "기타";
        break;
}
echo "\n";
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
// 을 출력해 주세요.

$rank = "1등";
switch($rank){
    case "1등":
        echo "금상";
        break;
    case "2등":
        echo "은상";
        break;
    case "3등":
        echo "동상";
        break;
    case "4등":
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}
echo "\n";
// 위에 프로그램을 if 문으로 변경
$num = 1;
if($num === 1){
    echo "금상";
}
else if($num === 2){
    echo "은상";
}
else if($num === 3){
    echo "동상";
}
else if($num === 4){
    echo "장려상";
}
else{
    echo "노력상";
}
echo "\n";
$num1 = 2;
$rank1 = "";
// $str_msg = "상";
$str_print ="%s상";
if($num1){
    if($num1 === 1){
        $rank1 = "금";
    }
    else if($num1 === 2){
        $rank1 = "은";
    }
    else if($num1 === 3){
        $rank1 = "동";
    }
    else if($num1 === 4){
        $rank1 = "장려";
    }
    else{
        $rank1 = "노력";
    }
    $str_msg = sprintf($str_print, $rank1);
}
echo $str_msg;