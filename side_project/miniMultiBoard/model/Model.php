<?php

namespace model;

use PDO;

class Model {
    protected $conn; // PDO 객체 저장용 , protected -> 상속관계에서 접속 가능하게 하기위함

    // 생성자
    public function __construct() {
        try {
            $opt = [
                PDO::ATTR_EMULATE_PREPARES      => false                    // DB의 Prepared Statement 기능을 하도록 설정
                ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION   // PDO Exception을 Throws하도록 설정
                ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC         // 연관 배열로 Fetch 설정
            ];

            // PDO 인스턴스
            $this->conn = new PDO(_MARIA_DB_DNS, _MARIA_DB_USER, _MARIA_DB_PW, $opt); // conn에는 $ 붙이지 않음
        } catch (\Throwable $th) {
            echo "Model >> __construct()\n".$th->getMessage();
            exit;
        }
    }

    // conn은 캡슐화를 유지하기위해
    // 트랜잭션 시작
    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    // 커밋
    public function commit() {
        $this->conn->commit();
    }

    // 롤백
    public function rollBack() {
        $this->conn->rollBack();
    }

    // DB 파기
    public function destroy() {
        $this->conn = null;
    }
}