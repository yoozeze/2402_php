<?php

// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
for($i=0; $i < 5; $i++){
    echo "*****"."\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****

for($i = 0; $i < 5; $i++){
    for($z = 0; $z <= $i; $z++){
        echo "*";
    }
    echo "\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****

// for문 2 + if 문
$num = 5;
for($i = 1; $i < $num; $i++){
    $cnt_space = $num - $i;
    for($z = 1; $z <= $num; $z++){
        if($z <= $cnt_space){
            echo " ";
        }
        else{
            echo "*";
        }
    }
    echo "\n";
}
// for문 3
for($i = 0; $i <$num; $i++){
    // 공백 for문
    for($z = 1; $z < $num - $i; $z++){
        echo " ";
    }
    // 별 for문
    for($y = 0; $y <= $i; $y++){
        echo "*";
    }
    echo"\n";
}