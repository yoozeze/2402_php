<?php

// if 문 : 조건에 따라 서로 다른 처리를 하는 문법
if( 1 > 2 ) {
    echo "1 > 2";
}  // false 라서 처리 안함
if( 1 > 0 ) {
    echo "1 > 2"."\n";
}

if( 1 > 2 ) {
    echo "1 > 2";
}
else if ( 1 !== 1 ) {
    echo "1 === 1";
}
else {
    echo "모두 false";
}

$arr = [1,2,3];
if(true) {
    $arr[] = 4;
}
print_r($arr);

// $num가 1이면 1등, 2면 2등, 3이면 3등, 그 외는 순위 외 (단, 7이면 럭키세븐)
$num = 42;
if( $num === 1 ){
    echo "1등";
}
else if( $num === 2){
    echo "2등";
} 
else if( $num === 3){
    echo "3등";
} 
else{
    if( $num !== 7){
        echo "순위 외";
    }
    else {
    echo "럭키세븐";
    }
}
echo "\n";
// 문제가 2개
// 1번문제의 정답은 2, 2번 문제의 정답은 5
// 한문제당 점수는 50점
$answer1 = 1;
$answer2 = 2;
if( $answer1 === 2 && $answer2 === 5 ){
    echo "100점";
}
else if ( $answer1 === 2 || $answer2 === 5 ){
    echo "50점";
}
else {
    echo "0점";
}
echo "\n";



