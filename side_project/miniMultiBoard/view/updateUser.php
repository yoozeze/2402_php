<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="./css/myCommon.css"> -->
    <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
    <script src="/view/js/bootstrap/bootstrap.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>회원 정보 수정</title>
</head>
<!-- <body> -->
<body class="vh-100">
    <!-- 헤더 -->
    <?php require_once("view/inc/header.php") ?>

    <!-- <main class="log-main"> -->
        <main class="d-flex justify-content-center align-items-center h-75">
            <form style= "width : 300px" action="/user/updateUser" method="POST">
                <?php require_once("view/inc/errorMsg.php") ?>
                <h2 class="mb-3">회원 정보 수정</h2>
                <div class="mb-3">
                    <label for="u_name" class="form-label">이름</label>
                    <input type="text" class="form-control" id="u_name" name="u_name" value="<?php echo $_SESSION["u_name"]["u_name"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="u_pw" class="form-label">비밀번호</label>
                    <input type="password" class="form-control" id="u_pw" name="u_pw">
                </div>
                <div class="mb-3">
                    <label for="u_pw" class="form-label">비밀번호 확인</label>
                    <input type="password" class="form-control" id="chk_u_pw" name="chk_u_pw">
                </div>
                <button type="submit" id="my-btn-complete" class="btn btn-dark">수정</button>
                <a href="/board/list" class="btn btn-secondary float-end">취소</a>
            </form>
            <!-- <form action="./free.html"> -->
    </main>
    <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
</body>
</html>