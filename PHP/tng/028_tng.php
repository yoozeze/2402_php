<?php

// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****

$str_star = "*****";
for($star = 1; $star < 6; $star++){
    echo $str_star."\n";
}
echo "\n";


// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
for($star1 = 0; $star1 < 6; $star1++){
    for($star2 = 0; $star2 < 6; $star2++){
    if($star2 < $star1){
        echo "*";
    }
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

for($star3 = 0; $star3 < 7; $star3++){
    for($star4 = 6; $star4 > 0; $star4--){
        if($star4 < $star3){
            echo "*";
        }
        else{
            echo " ";
        }
    }
    echo "\n";
}

for($a=1; $a<6; $a++){
    for($b=1; $b<6-$a; $b++){
        echo "*";
    }
    for($c=1; $c < $a+1; $c++){
        echo " ";
    }

}


for($i=1; $i<=5; $i++){
    for($j=0;$j<=17; $j++){
        if($j<=(17-$i) || $j>=(17+$i)){
        echo " ";
        }
        else{
            echo "*";
        }
    }
    echo "\n";
}

for($i=0;$i<=5;$i++){
    for($j=10;$j>0;$j--){
        if($j<(10-$i) && $j>$i){
        echo "*";
        }
        else{
            echo " ";
        }
    }
    echo "\n";
} 
echo "\n";
