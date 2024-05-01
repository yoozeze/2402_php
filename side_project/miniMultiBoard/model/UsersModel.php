<?php

namespace model;

class UsersModel extends Model {
    // 특정 유저를 조회하는 메소드
    public function getUserInfo($paramArr) {
        // $paramArr = [
            //     "u_id" => 1
            //     ,"u_email" => "asda@asd.com"
            //     ,"u_pw" => "asdfasdfa"
            // ];
            
        // $paramArr 무조건 값이 온다는 전제하에 
        // 동적쿼리 (어떤 값을 받아도 작동)
        try {            
            $sql = 
                " SELECT * "
                ." FROM users "
                ." WHERE "
            ;
    
            // WHERE절 동적 생성
            $arrWhere = [];
            foreach($paramArr as $key => $val) {
                $arrWhere[] = $key." = :".$key;
            }
    
            // WHERE절 추가
            $sql .= implode(" and ", $arrWhere);
    
            // 데이터 획득
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();

            return count($result) > 0 ? $result[0] : $result;

        } catch (\Throwable $th) {
            echo "UsersModel >> getUserInfo(), ".$th->getMessage();
            exit;
        }
    }
}

