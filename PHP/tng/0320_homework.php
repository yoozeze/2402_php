<?php
$num = 1;
$num3 = 0;
while($num < 101){
    $num++;
    $num3 = ($num % 3 === 0);
    echo $num."입니다.\n";
    }
}