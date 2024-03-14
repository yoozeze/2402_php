<?php

// for 문
// 특정 처리를 반복해서 구현할때 사용하는 문법
for($i = 0; $i <3; $i++){
    echo $i. "번째 루프\n"; // 반복할 처리
}

// 10번 도는 루프문을 만들어 주세요.
for($p = 0; $p < 10; $p++){
    echo $p;
}
echo "\n";

// 3이 되면 멈추기
for($p = 0; $p < 10; $p++){
    if($p === 3){ // 특정 조건일때 루프문 종료
        break; // 루프 종료
    }
    echo $p;
}
echo "\n";

// continue : continue 아래의 처리를 건너뛰고 다음 루프로 진행
for($p = 0; $p < 10; $p++){
    if($p === 3 || $p === 6 || $p === 9){
        continue;
    }
    echo $p; 
}

// 배열 루프
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for($i = 0; $i < $loop_cnt; $i++){
    echo $arr[$i];
}
echo "\n";

// 다중루프
for($i = 1; $i < 3; $i++){
    echo "1번 LOOP : ".$i."번째\n";
    for ($z = 1; $z < 3; $z++){
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}
echo "\n";
// 구구단 2단
$dan = 2;
for($multi_num = 1; $multi_num < 10; $multi_num++){
    $msg_line = $dan ." X ". $multi_num ." = ". ($dan*$multi_num)."\n";
    echo $msg_line;
}

// 구구단
for($a = 2; $a < 10; $a++){
    echo "** ".$a."단 **\n";
    for($b = 1; $b < 10; $b++){
        $msg_line = $a ." X ". $b ." = ".($a * $b);
        echo $msg_line."\n";
    }
}

for($star = 1; $star < 6; $star++){
}