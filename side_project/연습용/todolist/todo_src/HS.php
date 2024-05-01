<?php

require_once( $_SERVER["DOCUMENT_ROOT"]."/src/1config.php");
require_once(FILE_LIB_DB); // DB관련 라이브러리
// post 처리
if(REQUEST_METHOD === "POST") {
  try{
    // 파라미터 획득
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; //title 획득
    // 파라미터 에러 체크
    $arr_err_param = [];
    if($title === ""){
      $arr_err_param[] ="title";
    }
    if(count($arr_err_param) > 0 ){
      // 예외 처리
      // throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
      throw new Exception("뭐라도 입력하소");
    }
    // DB connect
    $conn = my_db_conn(); //PDO 인스턴스
    // Transaction 시작
    $conn->beginTransaction();
    // 게시글 작성 처리
    $arr_param = [
      "title" => $title
    ];
    $result = db_insert_todo($conn, $arr_param);
    // 글 작성 예외처리
    if($result !== 1) {
      throw new Exception("Insert todo count");
    }
    // 커밋
    $conn->commit();
    //리스트 페이지로 이동
    header("Location: 1main.php");
    exit;
  } catch (\Throwable $e) {
    if(!empty($conn)){
      $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
  } finally {
    if(!empty($conn)) {
      $conn = null;
    }
  }
}
?>

<div class="insert_in">
            <form class= insert_form action="./2insert.php" method="post">
                <div class="input_group">
                <input class = "insert_input" type="text" name="title" id="title">
                <button class = "insert_button" type="submit">작성완료</button>
                </div>
            </form>
        </div>
4:16
<div class="border" id="border<?php echo $item["no"]; ?>">
    <div class="cont">
        <form class= "flex"action="./update.php" method="post">
            <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
            <input type="hidden" name="page" value="<?php echo $page_num; ?>">
            <button type="submit" class="btn-update" id="nemo<?php echo $item["no"];?>"></button>
            <label class="nemo" for="nemo<?php echo $item["no"];?>"><?php echo $item["flg_com"] === "1" ? "✔ " : "" ?></label>
            <div class="in"><?php echo $item["title"]; ?></div>
        </form>