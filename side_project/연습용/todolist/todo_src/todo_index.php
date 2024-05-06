<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/todo_config.php");
require_once(FILE_LIB_DB);
$list_cnt = 7;
$page_num = 1;
$btn_page_cnt = 4;

try {
    $conn = my_todo_db_conn();

    // 파라미터에서 page 획득
    $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;

    // 게시글 수 조회
    $result_board_cnt = db_select_todo_cnt($conn);

    // 페이지 관련 설정 셋팅
    $max_page_num = ceil($result_board_cnt / $list_cnt);
    $offset = $list_cnt * ($page_num - 1);
    $prev_page_num = ($page_num - 1) < 1 ? 1 : ($page_num -1);
    $next_page_num = ($page_num + 1) > $max_page_num ? $max_page_num : ($page_num + 1);

    // 페이징네이션
    $start_page = ceil($page_num / $btn_page_cnt) * $btn_page_cnt - ($btn_page_cnt - 1);
    $end_page = $start_page + ($btn_page_cnt - 1);
    $end_page = $end_page > $max_page_num ? $max_page_num : $end_page;

    // 게시글 리스트 조회
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];
    $result = db_select_todo_paging($conn, $arr_param);


    
} catch (\Throwable $e) {
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
    <header>
        <div class="header-top">
            <a href="./todo_index.php">WEEKLY</a>
            <a href="./todo_add.php">ADD</a>
        </div>
        <h1>TO DO LIST</h1>
    </header>
    <main>
        <?php 
        foreach($result as $item) {
        ?>
            <div class="container_index">
                <div class="day-list">
                    <div class="main-border date"><?php echo $item["today"]; ?></div>
                </div>
                <div class="day-goals">
                    <a href="./todo_detail.php?no=<?php echo $item["no"]; ?>&page=<?php echo $page_num; ?>" class="main-border"><?php echo $item["day_goals"] ?></a>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="main-bottom">
            <a href="./todo_index.php?page=<?php echo $prev_page_num; ?>" class="main-border small-button">
                <i class="fa-solid fa-backward"></i>
            </a>
            <?php
            for($i = $start_page; $i <= $end_page; $i++){
            ?>
            <a href="./todo_index.php?page=<?php echo $i; ?>" class="main-border small-button <?php echo $i == $page_num ? "now_page_color" : ""; ?>"><?php echo $i; ?></a>
            <?php
            }
            ?>
            <a href="./todo_index.php?page=<?php echo $next_page_num; ?>" class="main-border small-button">
                <i class="fa-solid fa-forward"></i>
            </a>
        </div>
    </main>
</body>
</html>