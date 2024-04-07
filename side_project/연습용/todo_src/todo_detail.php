<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

try {
    $conn = my_todo_db_conn();

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
        "no" =>$no
    ];

    $result = db_select_todo_no($conn, $arr_param);

    if(count($result) !== 1){
        throw new Exception("Select Todo no count");
    }

    $item = $result[0];

    if(REQUEST_METHOD === "GET"){
        // 게시글 데이터 조회
        // 파라미터 획득
        $no = isset($_GET["no"]) ? $_GET["no"] : ""; // no 획득
        $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득

        // 파라미터 예외처리
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
            // 게시글 정보 획득
        $arr_param = [
            "no" => $no
        ];
        $result = db_select_boards_no($conn, $arr_param);
        if(count($result) !== 1){
            throw new Exception("Select Boards no count");
        }

        // 아이템 셋팅
        $item = $result[0];

    } else if(REQUEST_METHOD === "POST"){
        // 게시글 데이터 조회
        // 파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : "";
        $page = isset($_POST["page"]) ? $_POST["page"] : "";
        $day_goals = isset($_POST["day_goals"]) ? $_POST["day_goals"] : "";
        $todo1 = isset($_POST["todo1"]) ? $_POST["todo1"] : "";
        $todo2 = isset($_POST["todo2"]) ? $_POST["todo2"] : "";
        $todo3 = isset($_POST["todo3"]) ? $_POST["todo3"] : "";
        $todo4 = isset($_POST["todo4"]) ? $_POST["todo4"] : "";

        // 파라미터 예외처리
        $arr_err_param = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if($page === ""){
            $arr_err_param[] = "page";
        }
        if($title === ""){
            $arr_err_param[] = "day_goals";
        }
        if($content === ""){
            $arr_err_param[] = "todo1";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 수정 처리
        $arr_param = [
            "day_goals" => $day_goals
            ,"todo1" => $todo1
            ,"todo2" => $todo2
            ,"todo3" => $todo3
            ,"todo4" => $todo4
        ];
        $result = db_update_todo_no($conn, $arr_param);

        // 수정 예외 처리
        if($result !== 1){
            throw new Exception("Update Todo no count");
        }

        // commit
        $conn->commit();

        // 상세 페이지로 이동
        header("Location: detail.php?no=".$no."&page=".$page);
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
        <form action="./todo_detail.php" method="post">
            <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <div class="container_list">
                <div class="main1">
                    <?php 
                    foreach($result as $item) {
                    ?>
                        <div class="main-border">
                            <label for="date" class="title date">DATE</label>
                            <?php echo $item["today"] ?>
                        </div>
                        <div class="main-border">
                            <label class="goals-title" for="content">
                                <div class="title">DAY GOALS</div>
                                <?php echo $item["day_goals"] ?>
                            </label>
                            <div class="goals-content">
                                <textarea class="in" name="day_goals" id="day_goals"></textarea>
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
                            <input type="checkbox" name="chk-box1" id="chk-box1" class="chk-box0">
                            <label for="chk-box1">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="todo1" id="todo1" cols="3" rows="1"><?php echo $item["todo1"] ?></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box2" id="chk-box2" class="chk-box0">
                            <label for="chk-box2">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="todo2" id="todo2" cols="3" rows="1"><?php echo $item["todo2"] ?></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box3" id="chk-box3" class="chk-box0">
                            <label for="chk-box3">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="todo3" id="todo3" cols="3" rows="1"><?php echo $item["todo3"] ?></textarea>
                        </div>
                        <div class="list">
                            <input type="checkbox" name="chk-box4" id="chk-box4" class="chk-box0">
                            <label for="chk-box4">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <textarea class="in" name="todo4" id="todo4" cols="3" rows="1"><?php echo $item["todo4"] ?></textarea>
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