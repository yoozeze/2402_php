<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="/view/css/myCommon.css">
    <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
    <script src="/view/js/bootstrap/bootstrap.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/view/js/board.js" defer></script>
    <title>자유게시판</title>
</head>
<body>
    <!-- 헤더 -->
    <?php require_once("view/inc/header.php") ?>

    <div class="text-center mt-5 mb-5">
        <h1><?php echo $this->boardName ; ?></h1>
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="50" 
            height="50" 
            fill="currentColor" 
            class="bi bi-plus-circle-fill" 
            viewBox="0 0 16 16"
            data-bs-toggle="modal"
            data-bs-target="#modalInsert"
            >
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
        </svg>
    </div>

    <main class="main" id="card<?php echo $item["b_id"]; ?>">
        <?php
            foreach($this->arrBoardList as $item) {
        ?>
            <div class="card">
                <img src="<?php echo empty($item["b_img"]) ? "" : $item["b_img"]; ?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="cat-title"><?php echo $item["b_title"]; ?></h5>
                  <p class="card-text"><?php echo $item["b_content"]; ?></p>
                  <button 
                    class="btn btn-primary my-btn-detail"
                    data-bs-toggle="modal"
                    data-bs-target="#modalDetail"
                    value="<?php echo $item["b_id"]; ?>">상세</button>
                </div>
            </div>
        <?php        
            }
        ?>
    </main>
    <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
    

    <!-- 상세 모달 -->
    <div class="modal" tabindex="-1" id="modalDetail">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title">개발자입니다.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>살려주세요.</p>
                    <br>
                    <img src="" class="card-img-top">
                </div>
                <div class="modal-footer justify-content-between">
                    <div>
                        <button type="button" class="btn btn-warning" id="my-btn-update">수정</button>
                        <button type="button" class="btn btn-danger " id="my-btn-delete" >삭제</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                </div>
            </form>    
          </div>
        </div>
    </div>

    <!-- 작성 모달 -->
    <div class="modal" tabindex="-1" id="modalInsert">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/board/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="b_type" value="<?php echo $this->getBoardType(); ?>">
                <div class="modal-header">
                  <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
                    <br><br>
                    <input type="file" name="img" accept="image/*">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                  <button type="submit" class="btn btn-primary">작성</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</body>
</html>