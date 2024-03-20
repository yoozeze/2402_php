<?php
// while 문
echo "while 문\n";
$num = 1;
while ($num < 101){
    echo "$num 입니다. ";
    $num += 2;
}

// foreach
echo "\nforeach 문\n";
$arr_num = range(1, 100);
foreach($arr_num as $val){
    if($val % 3 !== 0){
        echo "$val 입니다. ";
    }
}

// for 문
echo "\nfor 문\n";
for($i = 1; $i < 101; $i++){
    if($i % 3 !== 0){
        echo "$i 입니다. ";
    }
}

