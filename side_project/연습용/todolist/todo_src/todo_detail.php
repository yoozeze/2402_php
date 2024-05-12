<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

if( $_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $conn = my_todo_db_conn();
        $day_goals = isset($_POST["day_goals"]) ? ($_POST["day_goals"]) : "";
        $todo = isset($_POST["todo"]) ? ($_POST["todo"]) : "";

        $arr_err_param = [];
        if($day_goals === ""){
            $arr_err_param[] = "day_goals";
        }
        if($todo === ""){
            $arr_err_param[] = "todo";
        }
        if (count($arr_err_param) > 0) {
            throw new Exception("Parameter Error: " . implode(". ", $arr_err_param));
        }

        $conn->beginTransaction();

        $arr_param = [
            "day_goals" => $day_goals
            ,"todo" => $todo
        ];

        $result = db_update_todolsit($conn, $arr_param);

        if ($result !== 1) {
            throw new Exception("Update todo count");
        }

        $conn->commit();
        header("Location: todo_detail.php?no=".$no."&page=".$page);
        exit;

    } catch (\Throwable $e) {
        if (!empty($conn) && $conn->inTransaction()) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
        
    }finally{
        if (!empty($conn)) {
            $conn = null;
        }
    }

} else if($_SERVER["REQUEST_METHOD"] === "GET"){
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
    
        if(count($arr_err_param) > 0) {
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }
    
        $arr_param = [
            "no" => $no
        ];
    
        $result = db_select_todo_no($conn, $arr_param);
    
        if(count($result) !== 1) {
            throw new Exception("Select list no count");
        }
    
        $item = $result[0];
        
    } catch (\Throwable $e) {
        echo $e->getMessage();
        exit;
    
    } finally {
        if(!empty($conn)) {
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
            <a href="./todo_delete.php?no=<?php echo $no; ?>&page=<?php echo $page; ?>">DELETE</a>
        </div>
        <h1>TO DO LIST</h1>
    </header>
    <main>
        <form method="post">
            <div class="container_list">
                <div class="main1">
                    <div class="main-border">
                        <div class="title">DATE</div>
                        <div class="date"><?php echo $item["today"]?></div>
                    </div>
                    <div class="main-border">
                        <label class="goals-title" for="content">
                            <div class="title">DAY GOALS</div>
                        </label>
                        <input type="text" class="day_goals" value="<?php echo $item["day_goals"]?>"></input>
                    </div>
                </div>
                <div class="main2">
                    <div class="main-border">
                        <div class="title">TO DO</div>
                        <div class="list">
                            <input type="checkbox" name="chk-box" id="chk-box<?php $item["no"]; ?>" class="chk-box0">
                            <label for="chk-box">
                                <div><i class="fa-solid fa-check"></i></div>
                            </label>
                            <input type="text" id="chk-box<?php $item["no"]; ?>" class="todo-text in" value="<?php echo $item["todo"]?>"></input>
                        </div>
                    </div>
                    <div class="save">
                        <button type="submit" formaction="./todo_update.php" class="save-button">CHANGE</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>