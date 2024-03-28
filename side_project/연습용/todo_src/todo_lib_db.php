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
        ."  today "
        ." ,day_goals "
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

function db_insert_todo(&$conn, &$array_param){
    $sql =
        " INSERT INTO todolist( "
        ."  today "
        ."  ,day_goals "
        ." ,weekly_goals "
        ." ) "
        ." VALUES( "
        ."  :today "
        ."  :day_goals "
        ."  :weekly_goals "
        ." ) "
        ;
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    return $stmt->rowCount();
}