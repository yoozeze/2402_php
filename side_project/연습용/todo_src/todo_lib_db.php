<?php

function my_todo_db_conn(){
    $option=[
        PDO::ATTR_EMULATE_PREPARES      => FALSE
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];
    return new PDO(MARIADB_DSN, MARIADB_USER, MARIADB_PASSWORD, $option);
}

function db_select_todo_cnt(&$conn){
    $sql =
        " SELECT "
        ." COUNT(no) as cnt "
        ." FROM "
        ."  todolist "
        ." WHERE "
        ."  deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetchALl();

    return (int)$result[0]["cnt"];
}

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

// pk로 게시글 정보 조회 
function db_select_todo_no(&$conn, &$array_param){
    $sql = 
        " SELECT "
        ."  no "
        ."  ,today "
        ."  ,day_goals "
        ."  ,weekly_goals "
        ." FROM "
        ."  todolist "
        ." WHERE "
        ."  no = :no "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    return $result;
}

// Insert row to boards 게시판 테이블 레코드 작성처리
function db_insert_todo(&$conn, &$array_param){
    $sql =
        " INSERT INTO todolist( "
        ."  today "
        ."  ,day_goals "
        ."  ,weekly_goals "
        ." ) "
        ." VALUES( "
        ."  :today "
        ."  ,:day_goals "
        ."  ,:weekly_goals "
        ." ) "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    return $stmt->rowCount();
}

// pk로 특정 게시글 삭제 처리
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

// pk로 특정 레코드 수정
function db_update_todo_no(&$conn, &$array_param){
    $sql =
        " UPDATE todolist "
        ."  SET "
        ."   today = :today "
        ."  ,day_goals = :day_goals "
        ."  ,weekly_goals = :weekly_goals "
        ."  ,updated_at = NOW() "
        ." WHERE "
        ."  no = :no "
    ;
    $stmt = $conn->prepare($sql);
    $stmt->execut($array_param);

    return $stmt->rowCount();
}