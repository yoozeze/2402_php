<?php

function my_todo_db_conn(){
    $option=[
        PDO::ATTR_EMULATE_PREPARES      => FALSE
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];
    return new PDO(MARIADB_DSN, MARIADB_USER, MARIADB_PASSWORD, $option);
}

// index 게시물 조회
function db_select_todo_cnt(&$conn){
    $sql =
        " SELECT "
        ."  COUNT(no) as cnt "
        ." FROM "
        ."  todolist "
        ." WHERE "
        ."  deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetchALl();

    return (int)$result[0]["cnt"];
}

// index 페이징네이션
function db_select_todo_paging(&$conn, &$array_param){
    $sql =
        " SELECT "
        ."  no "
        ."  ,today "
        ."  ,day_goals "
        ." FROM "
        ."  todolist "
        ." WHERE "
        ."  deleted_at IS NULL "
        ." ORDER BY "
        ."  no DESC "
        ." LIMIT :list_cnt OFFSET :offset "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    return $result;
}

// delete 페이지
function db_select_todo_no($conn, $array_param) {
    $sql = 
        " SELECT todolist "
        ."  no "
        ."  ,today "
        ."  ,day_goals "
        ."  ,todo "
        ."  ,created_at "
        ." FORM "
        ."  todolist " 
        ." WHERE "
        ." no = :no "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    return $result; 
}

function db_delete_todo_no(&$conn, &$array_param){
    $sql =
        " UPDATE todolist "
        ." SET "
        ."  deleted_at = NOW() "
        ." WHERE "
        ."  no = :no "
    ;
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    return $stmt->rowCount();
}

// add 페이지
function db_insert_todolsit(&$conn, &$array_param){
    $sql =
        " INSERT INTO todolist( "
        ." no "
        ." ,today "
        ." ,day_goals "
        ." ,todo "
        ." ) "
        ." VALUES( "
        ." :no "
        ." ,:today "
        ." ,:day_goals "
        ." ,:todo "
        ." ) "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    return $stmt->rowCount();
}
