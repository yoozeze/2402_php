<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

try {
    $conn = my_todo_db_conn();

    if(REQUEST_METHOD === "GET"){
    } else if(REQUEST_METHOD === "POST"){
        $today = isset($_POST["today"]) ? trim($_POST["today"]) : "";
        $day_goals = isset($_POST["day_goals"]) ? trim($_POST["day_goals"]) : "";
        $todo1 = isset($_POST["todo1"]) ? trim($_POST["todo1"]) : "";
        $todo2 = isset($_POST["todo2"]) ? trim($_POST["todo2"]) : "";
        $todo3 = isset($_POST["todo3"]) ? trim($_POST["todo3"]) : "";
        $todo4 = isset($_POST["todo4"]) ? trim($_POST["todo4"]) : "";
    
        $arr_err_param = [];
        if($today === ""){
            $arr_err_param[] = "today";
        }
        if($day_goals === ""){
            $arr_err_param[] = "day_goals";
        }
        if($todo1 === ""){
            $arr_err_param[] = "todo1";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }
    
        $conn = my_todo_db_conn();
    
        $conn->beginTransaction();
    
        $arr_param =[
            "today" => $today
            ,"day_goals" => $day_goals
            ,"todo1" => $todo1
            ,"todo2" => $todo2
            ,"todo3" => $todo3
            ,"todo4" => $todo4

        ];
    
        $result = db_insert_todo($conn, $arr_param);
    
        if($result !== 1){
            throw new Exception("Insert todo count");
        }
    
        $conn->commit();
    
        header("Location: todo_index.php");
        exit;
    }

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
    <?php require_once(FILE_HEADER_INDEX); ?>
    <main>
        <form action="./todo_add.php" method="post">
            <div class="container_list">
                <div class="main1">
                    <div class="main-border">
                        <label for="today" class="title">
                            <div class="title">DATE</div>
                            <textarea name="today" id="today" cols="20" rows="3"></textarea>
                        </label>
                    </div>
                    <div class="main-border">
                        <label class="goals-title" for="content">
                            <div class="title">DAY GOALS</div>
                            <textarea name="day_goals" id="day_goals" cols="20" rows="10"></textarea>
                        </label>
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
                            <textarea class="in" name="todo<?php  ?>" id="todo<?php  ?>" cols="3" rows="1"></textarea>
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