<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

try {
    $conn = my_todo_db_conn();

    if(REQUEST_METHOD === "GET"){
        // 게시글 데이터 조회
        // 파라미터 획득
        $no = isset($_GET["no"]) ? $_GET["no"] : "";
        $page = isset($_GET["page"]) ? $_GET["page"] : "";

        // 파라미터 예외처리
        $arr_err_param = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if($page === ""){
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        // 게시글 정보 획득
        $arr_param = [
            "no" => $no
        ];
        $result = db_select_todo_no($conn, $arr_param);
        if(count($result) !== 1){
            throw new Exception("Select Todo no count");
        }

        // 아이템 셋팅
        $item = $result[0];

    } else if(REQUEST_METHOD === "POST"){
        // 게시글 데이터 조회
        // 파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : "";
        $page = isset($_POST["page"]) ? $_POST["page"] : "";
        $today = isset($_POST["today"]) ? $_POST["today"] : "";
        $day_goals = isset($_POST["day_goals"]) ? $_POST["day_goals"] : "";
        $weekly_goals = isset($_POST["weekly_goals"]) ? $_POST["weekly_goals"] : "";
        $notes = isset($_POST["notes"]) ? $_POST["notes"] : "";

        // 파라미터 예외처리
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
        if($notes === ""){
            $arr_err_param[] = "notes";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        $conn->begingTransaction();

        $arr_param = [
            "no" => $no
            ,"todayd" => $today
            ,"day_goals" => $day_goals
            ,"weekly_goals" => $weekly_goals
            ,"notes" => $notes
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
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="./999_to_do_list.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>

</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <main>
        <form action="./todo_update.php" method="post">
            <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <div class="container_list">
                <div class="main1">
                    <?php 
                    foreach($result as $item) {
                    ?>
                        <div class="main-border">
                            <label for="date" class="title">DATE</label>
                            <?php echo $item["today"] ?>
                            <input type="date" id="date">
                        </div>
                        <div class="main-border">
                            <label class="goals-title" for="content">
                                <div class="title">DAY GOALS</div>
                                <?php echo $item["day_goals"] ?>
                            </label>
                            <div class="goals-content">
                                <textarea class="in" name="content" id="content" rows="6"></textarea>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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