<?php

// try, catch, finally
try {
    // 예외가 발생할 처리를 작성
    $i = 5 / 0;
    echo "\$i의 값은 : ";
    echo $i."\n";
}
catch(\Throwable $e){
    // 예외가 발생했을 때 처리를 작성 
    // 여러개 catch 가능
    echo "예외 발생 : ".$e->getMessage()."\n";
}
finally{
    // 예외 발생 여부와 상관없이 무조건 마지막 실행
    // finally 생략 가능
    echo "finally \n";
}
echo "계산 완료";