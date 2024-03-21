<?php
print_r($_POST);
// print_r($_POST["chk"]);
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
    <form action="/146_http_method_post.php" method="post">
        <input type="hidden" name="hidden" value="숨겨졌다.">
        <label for="id">아이디</label>
        <input type="text" name="id" id="id">
        <br>
        <label for="pw">비밀번호</label>
        <input type="password" name="pw" id="pw">
        <br>
        <label for="subway">SubWay</label>
        <input type="checkbox" name="chk[]" id="subway" value="subway">
        <label for="pan">빵</label>
        <input type="checkbox" name="chk[]" id="pan" value="빵">
        <label for="do">도삭면</label>
        <input type="checkbox" name="chk[]" id="do" value="도삭면">
        <br>
        <label for="m">남자</label>
        <input type="radio" name="radio" id="m" value="남자">
        <label for="f">여자</label>
        <input type="radio" name="radio" id="f" value="여자">
        <br>
        <button type="submit">로그인</button>
    </form>

</body>
</html>