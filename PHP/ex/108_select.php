<?php

require_once("./lib_db.php");

$limit = 7;

try {
    $conn = db_conn(); // PDO 객체 리턴 함수 호출
    
    $sql = 
        " SELECT "
        ."  * " 
        ." FROM "
        ."  employees "
        ." LIMIT "
        ."  5 "
        ;
    // placeholder 셋팅이 없는 경우
    // $stmt = $conn->query($sql);
    // $result = $stmt->fetchAll();
    // print_r($result);

    // placeholder 셋팅이 필요한 경우
    $sql = " SELECT * FROM employees LIMIT :limit OFFSET :offset"; // 보안 대처함
    $arr_prepare = [
        "limit" => $limit
        ,"offset" => 10
    ];
    $stmt = $conn->prepare($sql); // 쿼리 준비
    $stmt->execute($arr_prepare); // 쿼리 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치
    print_r($result);

} catch (\Throwable $e) {
    echo "예외 발생 : ".$e->getMessage()."\n";
} finally {
    $conn = null;
}
echo "처리 완료";

echo "-----------------------------------\n";

// 사번 10003, 10004의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// prepared stantement 이용해서 작성

$emp_no1 = 10003;
$emp_no2 = 10004;

try {
    $conn = db_conn();

    $sql =
        " SELECT "
	    ."  sal.salary "
	    ." ,emp.emp_no "
	    ." ,emp.birth_date "
        ." FROM " 
        ."  employees emp "
	    ."   JOIN "
        ."     salaries sal "
	    ."   ON " 
        ."    emp.emp_no = sal.emp_no "
	    ."   AND " 
        ."    emp.emp_no IN (:emp_no1, :emp_no2) "
	    ."   AND " 
        ."    sal.to_date >= date(now()) "
        ;
        $arr_prepare = [
            "emp_no1" => $emp_no1
            ,"emp_no2" => $emp_no2
        ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_prepare);
    $result = $stmt->fetchAll();
    print_r($result);
    
} catch (\Throwable $a) {
    echo "예외 발생 : ".$a->getMessage()."\n";
} finally {
    $conn = null;
}
echo "처리 완료\n";

// $arr_prepare = [10003, 10004];
// try {
//     // PDO 인스턴스 생성
//     $conn = db_conn();
//     // sql 작성
//     $sql = 
//         " SELECT "
//         ."  sal.salary "
//         ." ,emp.emp_no "
//         ." ,emp.birth_date "
//         ." FROM " 
//         ."  employees emp "
//         ."   JOIN "
//         ."     salaries sal "
//         ."   ON " 
//         ."    emp.emp_no = sal.emp_no "
//         ."   AND " 
//         ."    sal.to_date >= date(now()) "
//         ."  WHERE "
//         ."    emp.emp_no IN ( :emp_no1, :emp_no2)
//         ;
//         $arr_prepare =[
//             "emp_no1" => $arr_emp_no[0]
//             ,"emp_no2" => $arr_emp_no[1]
//         ];
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($arr_prepare);
//     $result = $stmt->fetchAll();
//     print_r($result);
// }

$arr = [10003, 10004, 10005];
var_dump(implode(",",$arr));
