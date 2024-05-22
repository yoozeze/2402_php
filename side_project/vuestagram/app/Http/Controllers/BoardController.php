<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use MyBoardValidate;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * 초기 보드리스트 획득
     * 
     * @param   string $id 마지막 게시글 PK
     * @return  response() json
     */
    public function index($id) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'id' => $id
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }
        // 게시글 정보 획득
        //  - $id == 0 일 경우, 최초 게시글 습득
        //  - $id != 0 일 경우, 해당 id까지의 모든 데이터 습득
        $boardList = Board::join('users', 'boards.user_id', '=','users.id')
                ->select('boards.*', 'users.name')
                ->orderBy('boards.id', 'DESC')
                ->when($id, function($query, $id) {
                    // $query = when 직전까지의 쿼리 들어감
                    // $id = 앞에 $id 
                   return $query->where('boards.id', '>=', $id);
                })
                ->unless($id, function($query, $id) {
                    return $query->limit(20);
                })
                // ->limit(20)
                ->get();

        // id != 0
        // Board::join('users', 'boards.user_id', '=','user.id')
        //         ->select('boards.*', 'users.name',)
        //         ->orderBy('id', 'DESC')
        //         ->where('id', '>=', $id)
        //         ->get();

        $requestData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardList->toArray()
        ];

        return response()->json($requestData, 200);
    }
}
