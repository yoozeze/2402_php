<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LEB_DB);

// detail

try {
    $conn = my_todo_db_conn();

    $NO = isset($_GET["NO"]) ? $_GET["NO"] : "";
    $page = isset($_GET["page"]) ? $_GET["page"] : "";

    $arr_err_param = [];
    if($NO === ""){
        $arr_err_param[] = "NO";
    }
    if($page === ""){
        $arr_err_param[] = "page";
    }
    if(count($arr_err_param) > 0 ){
        throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
    }
    $arr_param=[
        "NO" => $NO
    ];
    $result = db_select_todo_no($conn, $arr_param);
    if(count($result) !== 1){
        throw new Exception("Select Todo no count");
    }

    $item = $result[0];

} catch (\Throwable $e) {
   echo $e->getMessage();
   exit;
} finally {
    if(!empty($conn)){
        $conn = null;
    }
}
?>


<?php

// insert

if(REQUEST_METHOD === "POST") {
    try {
        $today = isset($_POST["today"]) ? trim($_POST["today"]) : "";
        $day_goals = isset($_POST["day_goals"]) ? trim($_POST["day_goals"]) : "";
        $weekly_goals = isset($_POST["weekly_goals"]) ? trim($_POST["weekly_goals"]) : "";

        $arr_err_param = [];
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

        $conn = my_todo_db_conn();

        $conn->beginTransaction();

        $arr_param = [
            "today" => $today
            ,"day_goals" => $day_goals
            ,"weekly_goals" => $weekly_goals
        ];
        $result = db_insert_todo($conn, $arr_param);

        if($result !== 1){
            throw new Exception("Insert Todo count");
        }

        $conn->commint();

        header("Location: todo_index.php");
        exit;

    } catch (\Throwable $e) {
        if(!empty($conn) && $conn->inTransaction()){
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    } finally {
        if(!empty($conn)){
            $conn = null;
        }
    }
}

?>