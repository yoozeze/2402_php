<?php

// while 문
$cnt = 0;
while($cnt < 3){
    echo "count : $cnt \n";
    $cnt++;
}
$cnt = 0;
while(true){
    $cnt++;
    if($cnt === 3){
        break;
    }
    echo "$cnt \n";
}
// 2단 출력
$num = 1;
$dan = 2;
while($num < 10){
    $num_multi = $dan * $num; 
    echo "$dan X $num = $num_multi\n";
    $num++;
}

echo"\n";

// 구구단 
$dan1 = 2;
while($dan1 < 10){
    $num1 = 1;
    echo "$dan1 단\n";
    while($num1 < 10){
        $num_multi1 = $dan1 * $num1; 
        echo "$dan1 X $num1 = $num_multi1\n";
        $num1++;
    }
    $dan1++;
}
