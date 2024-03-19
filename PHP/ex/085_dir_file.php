<?php

// 폴더(디렉토리) 존재여부 체크
if(is_dir("./test")){
    echo "이미 존재하는 디렉토리\n";
}
else{
    echo "없는 디렉토리\n";
    
    // 폴더(디렉토리) 생성
    $result = mkdir("./test", 777);
    if($result){
        echo "디렉토리 생성 성공\n";
    }
    else{
        echo "디렉토리 생성 실패\n";
    }
}

// 디렉토리 삭제
$result = rmdir("./test");
if($result){
    echo "디렉토리 삭제 성공\n";
}
else{
    echo "디렉토리 삭제 실패\n";
}

// 디렉토리 열기 및 읽기
$open_dir = opendir("./"); // 디렉토리 열기
while($item = readdir($open_dir)){
    echo $item."\n";
}

// 디렉토리 닫기 void -> retrun 없음
closedir($open_dir);

// ---------------------
// 파일 오픈
// a = 파일없으면 생성
$file = fopen("./999_test.php", "a");
if($file){
    echo "파일 오픈 성공\n";

    // 파일에 데이터 쓰기
    fwrite($file, "글쓰기 테스트\n");

    // 파일 닫기
    fclose($file);
}
else{
    echo "파일 오픈 실패\n";
}

// 파일 삭제
unlink("./999_test.php");