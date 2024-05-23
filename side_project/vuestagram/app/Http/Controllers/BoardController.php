<?php

namespace App\Http\Controllers;

use MyToken;
use MyBoardValidate;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Exceptions\MyValidateException;

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

    /**
     * 초기 보드리스트 획득
     * 
     * @param   string $id 마지막 게시글 PK
     * @return  response() json
     */
    public function addIndex($id) {
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
        $boardList = Board::join('users', 'boards.user_id', '=','users.id')
                            ->select('boards.*', 'users.name')
                            ->orderBy('boards.id', 'DESC')
                            ->where('boards.id', '<', $id)
                            ->limit(20)
                            ->get();

        $requestData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardList->toArray()
        ];

        return response()->json($requestData, 200);
    }

    /**
     * 글 작성
     * 
     * @param   Illuminate\Http\Request $request
     * @return  string json
     */
    public function store(Request $request) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'content' => $request->content
            ,'img' => $request->img
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // insert 데이터 생성
        $insertData = $request->only('content');
        $insertData['user_id'] = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        $filePath = $request->file('img')->store('img');
        $insertData['img'] = '/'.$filePath;
        $insertData['like'] = 0;

        // insert 처리
        $boardInfo = Board::create($insertData);

        // response 데이터 생성
        $responseData = [
            'code' => '0'
            ,'img' => ''
            ,'data' => $boardInfo
        ];

        return response()->json($responseData, 200);
    }
}
