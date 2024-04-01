<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

if(REQUEST_METHOD === "POST") {
    try {
        $today = isset($_POST["today"]) ? trim($_POST["today"]) : "";
        $day_goals = isset($_POST["day_goals"]) ? trim($_POST["day_goals"]) : "";
        $weekly_goals = isset($_POST["weekly_goals"]) ? trim($_POST["weekly_goals"]) : "";
        $notes = isset($_POST["notes"]) ? trim($_POST["notes"]) : "";

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
        if($notes === ""){
            $arr_err_param[] = "notes";
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
            ,"notes" => $notes
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
    <?php require_once(FILE_HEADER_INSERT); ?>
    <main>
        <form action="./todo_update.php" method="post"></form>
            <div class="container_list">
                <div class="main1">
                    <div class="main-border">
                        <label for="date" class="title">
                            DATE
                            <br>
                        </label>
                        <input type="date" id="date">
                    </div>
                    <div class="main-border">
                        <label class="goals-title" for="content">
                            <div class="title">DAY GOALS</div>
                        </label>
                        <div class="goals-content">
                            <textarea name="content" id="content" rows="6"></textarea>
                        </div>
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
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box2" id="chk-box2" class="chk-box0">
                            <label for="chk-box2">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box3" id="chk-box3" class="chk-box0">
                            <label for="chk-box3">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box4" id="chk-box4" class="chk-box0">
                            <label for="chk-box4">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box5" id="chk-box5" class="chk-box0">
                            <label for="chk-box5">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box6" id="chk-box6" class="chk-box0">
                            <label for="chk-box6">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box7" id="chk-box7" class="chk-box0">
                            <label for="chk-box7">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="to-do-content" id="to-do-content" cols="3" rows="1"></textarea>
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