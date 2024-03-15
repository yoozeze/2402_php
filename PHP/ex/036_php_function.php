<?php

// trim (문자열) : 공백 제거 함수
$str = "    홍길동  ";
echo trim($str)."\n";

// strtoupper(문자열) : 대문자 출력
echo strtoupper("abcdef")."\n";
// strtolower(문자열) : 소문자 출력
echo strtolower("ABCDEF")."\n";

// str_replace(대상문자열, 변경 문자열, 원본문자열) : 특정 문자를 치환
echo str_replace("c","Z","abcdefg")."\n";
echo str_replace("c","",str_replace("f", "","abcdefg"))."\n";

// mb_substr(문자열, 시작위치, 출력할 갯수) : 문자열을 시작위치에서 종료위치까지 잘라서 반화
$str = "홍길동갑순이";
echo mb_substr($str, 1, 4)."\n";
echo mb_substr($str, 1)."\n";

// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환
$str = "나바 홍길동 입니다홍.";
echo mb_strpos($str, "홍")."\n";

if(mb_strpos($str, "홍") !== false){
    echo "포함됨";
}
else {
    echo "없어";
}