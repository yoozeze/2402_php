<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // 쿼리 빌더
        // $result = DB::select('select * from users');
        
        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = :name"
        //     , ['name' => '갑돌이']
        // );
        
        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = ?"
        //     , ['갑돌이']
        // );

        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = ? or name = ?"
        //     , ['갑돌이', '갑순이']
        // );

        // // 탈퇴한 회원
        // $result = DB::select('SELECT * FROM users WHERE deleted_at is not null');

        // insert
        // $sql = 'INSERT INTO users(name, email, password) VALUES(?, ?, ?)';
        // $data = ['김철수', 'admin4@admin.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); // 트랜잭션 시작
        // $result = DB::insert($sql, $data);
        // if(!$result) {
        //     DB::rollBack(); // 롤백
        // } else {
        //     DB::commit(); // 커밋
        // }

        // update
        // $sql = 'UPDATE users SET deleted_at = null WHERE id = ?';
        // $data = [4];
        // $result = DB::update($sql, $data);

        // delete
        // $sql = 'DELETE FROM users WHERE id = ?';
        // $data = [7];
        // $result = DB::delete($sql, $data);


        // ----------------------------------------------------------------------------
        // 쿼리 빌더 체이닝

        // users 테이블 모든 데이터 조회
        $result = DB::table('users')->get();

        $result = DB::table('users')->where('name', '=', '홍길동')->get();
        // dd() 이용해서 쿼리문 확인 가능
        // $result = DB::table('users')->where('name', '=', '홍길동')->dd();

        // select * from users where id = ? or id = ?; [3, 4]
        $result = DB::table('users')->where('id', 3)->orWhere('id', 4)->get();
        // $result = DB::table('users')->where('id', 3)->orWhere('id', 4)->dd();

        // select * from users where name = '홍길동' and id = 3; ['홍길동', 2]
        $result = DB::table('users')->where('name','홍길동')->where('id', 2)->get();

        // select name from users order by name ASC;
        $result = DB::table('users')->select('name')->orderBy('name')->get(); // asc
        $result = DB::table('users')->select('name')->orderBy('name','desc')->get();  // desc
        
        return var_dump($result);
        // return var_dump($result[0]->name);

    }
}
