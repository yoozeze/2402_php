<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $result = DB::table('users')
                ->where('name', '=', '홍길동')
                ->get();
        // dd() 이용해서 쿼리문 확인 가능
        // $result = DB::table('users')->where('name', '=', '홍길동')->dd();

        // select * from users where id = ? or id = ?; [3, 4]
        $result = DB::table('users')
                ->where('id', 3)
                ->orWhere('id', 4)
                ->get();
        // $result = DB::table('users')->where('id', 3)->orWhere('id', 4)->dd();

        // select * from users where name = '홍길동' and id = 3; ['홍길동', 2]
        $result = DB::table('users')
                ->where('name','홍길동')
                ->where('id', 2)
                ->get();

        // select name from users order by name ASC;
        $result = DB::table('users')
                ->select('name')
                ->orderBy('name')
                ->get(); // asc
        $result = DB::table('users')
                ->select('name')
                ->orderBy('name','desc')
                ->get();  // desc

        // WHERE 절
        // select * from users where id in (?, ?); [2, 5]
        $result = DB::table('users')
                ->whereIn('id', [2, 5])
                ->get();
        
        // select * from users where deleted_at is null;
        $result = DB::table('users')
                ->whereNull('deleted_at')
                ->get();

        // 2023년에 가입한 사람만 출력
        // select * from users where year(created_at) = ?
        // select * from users created_at beetween 2023010100000 and 20231231235959 -> 속도 이슈가 생길때 사용할 쿼리
        $result = DB::table('users')
                ->whereYear('created_at','2023')
                ->get();

        // GROUP BY
        // 각 성별 회원의 수를 구하자
        // select count(gender) from users group by gender having gender = 'M' or gender = 'F' ->내가 한거
        $result = DB::table('users')
                ->select('gender', DB::raw('COUNT(gender) cnt'))
                ->groupBy('gender')
                ->having('gender', '=', 'F')
                ->orHaving('gender', '=', 'M')
                ->get();
        // select gender, count(gender) cnt from users group by gender; -> 강사님
        $result = DB::table('users')
                ->select('gender', DB::raw('COUNT(gender) cnt'))
                ->groupBy('gender')
                ->get();

        // select id, name from users order by limit ? offset ?; [1, 2]
        $result = DB::table('users')
                ->select('id', 'name')
                ->orderBy('id')
                ->limit(1)
                ->offset(2)
                ->get();
        
        $reqData = 1; // 유저가 1또는 빈 값(null, '')인 데이터 전달
        $result = DB::table('users')
                ->when($reqData, function($query, $reqData) {
                    $query->where('id', $reqData);
                })
                ->get();

        // 쿼리 실행 메소드
        // first() : 쿼리 결과에서 가장 첫번째 레코드만 반환
        $result = DB::table('users')->first();

        // count() : 쿼리 결과의 레코드 수를 반환
        $result = DB::table('users')->count();

        // find($id) : 지정된 기본키의 해당하는 레코드를 반환, PK를 알고 있으면 빠르게 찾을 수 있음
        $result = DB::table('users')->find(3);

        // insert
        // $result = DB::table('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@admin.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ]);
        
        // update
        // $result = DB::table('users')
        //         ->where('id', 11)
        //         ->update([
        //             'email' => 'kim@naver.com'
        //         ]);
        
        // delete
        // $result = DB::table('users') 
        //         ->where('id', 11)
        //         ->delete();

        // ------------------------------------------------------
        // Eloquent Model
        $result = User::all();
        // return var_dump($result[0]->name);
        // $result = User::find(3);
        // return var_dump($result->email);

        // upsert : 상황에 따라 update / insert 함
        // insert
        $data = [
            'name' => '김영희'
            ,'email' => 'kim@naver.com'
            ,'password' => Hash::make('qwer1234!')
            ,'gender' => 'F'
        ];

        // $result = User::create($data);

        // update save
        // DB::beginTransaction();
        // $target = User::find(13);
        // $target->gender = 'M';
        // $result = $target->save();
        // DB::commit();

        // delete 소프트 딜리트
        $result = User::destroy(13);

        // 소프트 딜리트 된 데이터 조회
        // 소프트 딜리트 포함된 데이터도 함께 조회
        $result = User::withTrashed()->get();

        // 소프트 딜리트된 데이터만 조회
        $result = User::onlyTrashed()->get();

        // 소프트 딜리트 된것 복원
        $result = User::where('id', 13)->restore();
        
        return var_dump($result);
        // return var_dump($result[0]->name);

    }
}
