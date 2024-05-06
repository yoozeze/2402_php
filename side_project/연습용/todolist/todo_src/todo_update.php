<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

try {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $no = isset($_POST["no"]) ? $_POST["no"] : "";
        $day_goals = isset($_POST["day_goals"]) ? trim($_POST["day_goals"]) : "";
        $todo = isset($_POST["todo"]) ? trim($_POST["todo"]) : "";

        $arr_err_parma = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if($day_goals === ""){
            $arr_err_param[] = "day_goals";
        }
        if($todo === ""){
            $arr_err_param[] = "todo";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        $conn = my_todo_db_conn();
        
        $conn->beginTransaction();

        $arr_param = [
            "no" => $no
            ,"day_goals" => $day_goals
            ,"todo" => $todo
        ];

        $result = db_update_todolsit($conn, $arr_param);

        if($result !== 1){
            throw new Exception("Update todo count");
        }

        $conn->commit();

        header("Location: todo_detail.php?no=". $no);
        exit;
    }
} catch (\Throwable $e) {
    if(!empty($conn) && conn->inTransaction()) {
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;

} finally {
    if(!empty($conn)){
        $conn = null;
    }
}