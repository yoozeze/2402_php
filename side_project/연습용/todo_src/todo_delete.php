<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);

try {
    $conn = my_todo_db_conn();

    if(REQUEST_METHOD === "GET"){
        $NO = isset($_GET["no"]) ? $_GET["no"] : "";
        $page = isset($_GET["page"]) ? $_GET["page"] : "";

        $arr_err_param = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if($page === ""){
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        $arr_param = [
            "no" => $NO
        ];
        $result = db_select_todo_no($conn, $arr_param);
        if(count($result) !== 1){
            throw new Exception("Select Todo no count");
        }

        $item = $result[0];
    }
    else if (REQUEST_METHOD === "POST"){
        $NO = isset($_POST["no"]) ? $_POST["no"] : "";
        
        $arr_err_param = [];
        if($NO === ""){
            $arr_err_param[] = "no";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parametr Error : ".implod(", ", $arr_err_param));
        }
        $conn->beginTransaction();

        $arr_param = [
            "no" => $NO
        ];
    }

} catch (\Throwable $e) {

}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="./999_to_do_list.css">
</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <main>
        <div class="main-top">
            <p>
                삭제하면 영구적으로 복구 할 수 없습니다.
                <br>
                정말로 삭제 하시겠습니까?
            </p>
        </div>
        <div class="container_delete">
            <div class="box">
                <a href="./index.php" class="main-border">YES</a>
            </div>
            <div class="box">
                <a href="./index.php" class="main-border">NO</a>
            </div>
        </div>
    </main>
</body>
</html>