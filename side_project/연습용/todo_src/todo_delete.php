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
        if(count($arr_err_param) > 0){
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
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
    }
    else if (REQUEST_METHOD === "POST"){
        // 파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : "";
        
        // 파라미터 예외처리
        $arr_err_param = [];
        if($no === ""){
            $arr_err_param[] = "no";
        }
        if(count($arr_err_param) > 0 ){
            throw new Exception("Parametr Error : ".implode(", ", $arr_err_param));
        }

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 정보 삭제
        $arr_param = [
            "no" => $no
        ];

        $result = db_delete_todo_no($conn, $arr_param);

        // 삭제 예외 처리
        if($result !== 1){
            throw new Exception("Delete Todo no count");
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
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="./999_to_do_list.css">
</head>
<body>
    <header>
        <div class="header-top">
            <a href="./todo_index.php">WEEKLY</a>
            <a href="./todo_add.php">ADD</a>
            <a href="./todo_delete.php?no=<?php echo $no; ?>&page=<?php echo $page; ?>">DELETE</a>
        </div>
        <h1>TO DO LIST</h1>
    </header>
    <main>
        <div class="main-top">
            <p>
                삭제하면 영구적으로 복구 할 수 없습니다.
                <br>
                정말로 삭제 하시겠습니까?
            </p>
        </div>
        <form action="./todo_delete.php" method="post">
            <div class="container_delete">
                <div class="box">
                    <input type="hidden" name="no" value="<?php echo $no; ?>">
                    <button type="submit" class="yesno">YES</button>
                </div>
                <div class="box">
                    <a href="./todo_index.php?no=<?php echo $no; ?>&page=<?php echo $page; ?>" class="main-border">NO</a>
                </div>
            </div>
        </form>
    </main>
</body>
</html>