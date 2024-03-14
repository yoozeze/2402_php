<?php
for($a=1; $a<6; $a++){
    for($b=1; $b<6-$a; $b++){
        echo " ";
    }
    for($c=1; $c < $a+1; $c++){
        echo "*";
    }
    echo "\n";
}