<?php

function my_db_conn(){
    // 설정 정보
    $option = [
        PDO::ATTR_EMULATE_PREPARES      => FALSE
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];

    // 리턴
    return new PDO(MARIADB_DSN, MARIADB_USER, MARIADB_PASSWORD, $option);
}

function db_select_boards_cnt(&$conn){
    // sql 작성
    $sql =
    " SELECT "	
	."  COUNT(no) as cnt "
    ." FROM "
	."  boards "
    ." WHERE "
	."  deleted_at IS NULL "	
    ;

    // Query 실행
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll();

    // 리턴
    return (int)$result[0]["cnt"];
}


function db_select_boards_paging(&$conn, &$array_param){
    // sql 작성
    $sql =
        " SELECT "	
        ."  no "
        ."  ,title "
        ."  ,created_at "
        ." FROM "
        ."  boards "
        ." WHERE "
        ."  deleted_at IS NULL "
        ." ORDER BY "	
        ."  no DESC "
        ." LIMIT :list_cnt OFFSET :offset "	
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    // 리턴
    return $result;
}

// Insert row to boards 게시판 테이블 레코드 작성처리
function db_insert_boards(&$conn, &$array_param){
    $sql =
        " INSERT INTO boards( "
        ."  title "		
        ."  ,content "	
        ." ) "
        ." VALUES( "		
        ."  :title "	
        ."  ,:content "	
        ." ) "
        ;		
    
    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    // 리턴
    return $stmt->rowCount();
}
