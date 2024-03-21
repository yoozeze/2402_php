<?php

$id = isset($_GET["id"]) ? $_GET["id"] : "";
$pw = isset($_GET["pw"]) ? $_GET["pw"] : "";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    
</head>
<body>
    <h1>로그인</h1>
    <form action="/146_tng.php" method="get">
        <label for="id">아이디</label>
        <input type="text" name="id" id="id">
        <br>
        <label for="pw">비밀번호</label>
        <input type="password" name="pw" id="pw">
        <br>
        <button type="submit">로그인</button>
    </form>
    <?php
        if($id !== ""){
            echo "<h2>당신의 ID는 $id 입니다.</h2>";
        }
        if($pw !== ""){
            echo "<h2>당신의 PW는 $pw 입니다.</h2>";
        }
    ?>
</body>
</html>