<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

if (REQUEST_METHOD === "POST") {
    try {
        $today = isset($_POST["today"]) ? trim($_POST["today"]) : "";
        $day_goals = isset($_POST["day_goals"]) ? trim($_POST["day_goals"]) : "";
        $todo = isset($_POST["todo"]) ? trim($_POST["todo"]) : "";

        $arr_err_param = [];
        if($today === ""){
            $arr_err_param[] = "today";
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
            "today" => $today
            ,"day_goals" => $day_goals
            ,"todo" => $todo
        ];

        $result = db_insert_todolsit($conn, $arr_param);

        if($result !== 1){
            throw new Exception("Insert todo count");
        }

        $conn->commit();

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

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./999_to_do_list.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>

</head>
<body>
    <header>
        <div class="header-top">
            <a href="./todo_index.php">WEEKLY</a>
            <a href="./todo_index.php">CANCEL</a>
        </div>
        <h1>TO DO LIST</h1>
    </header>
    <main>
        <form action="./todo_add.php" method="POST">
            <div class="container_list">
                <div class="main1">
                    <div class="main-border">
                        <div class="title">DATE</div>
                        <input type="date" class="date" name="today" id="today">
                    </div>
                    <div class="main-border">
                        <label class="goals-title" for="day_goals">
                            <div class="title">DAY GOALS</div>
                        </label>
                        <input type="text" name="day_goals" id="day_goals" class="day_goals">
                    </div>
                </div>
                <div class="main2">
                    <div class="main-border">
                        <div class="title">TO DO</div>
                        <div class="list">
                            <input type="checkbox" name="chk-box" id="chk-box" class="chk-box0">
                            <label for="chk-box">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <input type="text" name="todo" class="todo-text">
                        </div>
                    </div>
                    <div class="save">
                        <button type="submit" class="save-button">SAVE</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>