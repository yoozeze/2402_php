<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

try {
    $conn = my_todo_db_conn();

    if(REQUEST_METHOD === "GET"){
        $no = isset($_GET["no"]) ? $_GET["no"] : "";
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        
        $arr_err_param = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if($page === ""){
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }
        $arr_param = [
            "no" => $no
        ];

        $result = db_select_todo_no($conn, $arr_param);
        if(count($result) !== 1){
            throw new Exception("Select Todo no count");
        }

        $item = $result[0];

    } else if (REQUEST_METHOD === "POST"){
        $no = isset($_POST["no"]) ? $_POST["no"] : "";
        $page = isset($_POST["page"]) ? $_POST["page"] : "";
        $today = isset($_POST["today"]) ? $_POST["today"] : "";
        $day_goals = isset($_POST["day_goals"]) ? $_POST["day_goals"] : "";
        $weekly_goals = isset($_POST["weekly_goals"]) ? $_POST["weekly_goals"] : "";

        $arr_err_param = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if($page === ""){
            $arr_err_param[] = "page";
        }
        if($today === ""){
            $arr_err_param[] = "today";
        }
        if($day_goals === ""){
            $arr_err_param[] = "day_goals";
        }
        if($weekly_goals === ""){
            $arr_err_param[] = "weekly_goals";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        $conn->begingTransaction();

        $arr_param = [
            "no" => $no
            ,"today" => $today
            ,"day_goals" => $day_goals
            ,"weekly_goals" => $weekly_goals
        ];
        $result = db_update_todo_no($conn, $arr_param);

        if($result !== 1){
            throw new Exception("Update Todo no count");
        }

        $conn->commit();

        header("Location: todo_index.php?no=".$no."&page=".$page);
        exit;
    }

} catch (\Throwable $e) {
    if(!empty($conn)  && $conn->inTransaction()){
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
} finally {
    if(!empty($conn)){
        $conn = null;
    }
}
?>