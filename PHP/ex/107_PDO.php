<?php

// DB접속 정보
$dbHost     = "localhost"; // DB Host, ip 주소
$dbUser     = "root"; // DB 계정명
$dbPw       = "php505"; // DB 패스워드
$dbName     = "employees"; // DB명
$dbCharset  = "utf8mb4"; // DB charset
$dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset; // dsn

// PDO 옵션
$opt = [
    // Prepared Statement로 쿼리를 준비할 때, PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
    PDO::ATTR_EMULATE_PREPARES      => false //DB에서 에뮬레이션 하게 설정
    // PDO에서 예외를 처리하는 방식을 지정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    // DB의 결과를 저장하는 방식
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연상배열로 패치
                                    // PDO::FETCH_OBJ stdClass 객체로 데이터 패치
];

$conn = new PDO($dbDsn, $dbUser, $dbPw, $opt);

// 쿼리 작성
$sql = 
    " SELECT " // 연결했을때 글자가 붙지않게 양옆은 띄움 필수
    ."  * " 
    ." FROM "
    ."  employees "
    ." LIMIT "
    // ."  10 " // del 240320 현업에서는 수정한 기록을 남김
    ."  5 " // add 240320
    ;
$stmt = $conn->query($sql); // 쿼리 준비 + 실행
$result = $stmt->fetchAll(); // 질의 결과 패치
print_r($result);

$conn = null; // PDO 파기, PDO가 리소스를 많이 잡아먹어서 파기시킴