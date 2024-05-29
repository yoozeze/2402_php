<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    //최초 게시글 획득
    public function index() {
        $boardData = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id', '=', 'boards.user_id')
                            ->orderBy('id', 'DESC')
                            ->limit(20)
                            ->get();
        
        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];

        return response()->json($responseData, 200);
    }

    // 추가 게시글 획득
    public function moreIndex($id) {
        $boardData = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id', '=', 'boards.user_id')
                            ->where('boards.id', '<', $id)
                            ->orderBy('boards.id', 'DESC')
                            ->limit(20)
                            ->get();

        $responseData = [
            'code' => '0'
            ,'msg' => '추가 게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];

        return response()->json($responseData, 200);
    }

    // 게시글 작성
    public function createBoard(Request $request) {
        // user_id 획득
        // $user = Auth::user();
        // $request['user_id'] = $user->id;
        $request['user_id'] = Auth::id();

        // 유효성 체크용 데이터 초기화
        $requestData = [
            'content' => $request->content
            ,'img' => $request->img
        ];

        // 유효성 체크
        $validator = Validator::make(
            $requestData
            ,[
                'content' => ['required', 'max:200']
                ,'img' => ['required', 'image']
            ]
        );
        // 강사님 방법 
        // $validator = Validator::make(
        //     $request->only('content', 'img')
        //     ,[
        //         'content' => ['required','min:1', 'max:200']
        //         ,'img' => ['required', 'image']
        //     ]
        // );

        // 유효성 검사 실패 체크
        if($validator->fails()) {
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 작성 데이터 생성
        $insertData = $request->all();

        // 파일 저장
        // $insertData['img'] = $request->file('img')->store('img');
        // 강사님 방법
        $path = $request->file('img')->store('img');

        // 인서트 처리
        // $insertBoard = Board::create($insertData);

        // 강사님 방법
        $boardModel = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id', '=', 'boards.id')
                            ->where('users.id', Auth::id())
                            ->first();
        $boardModel->content = $request->content;
        $boardModel->img = $path;
        $boardModel->user_id = Auth::id();
        $boardModel->save();
        
        // 레스폰스 처리
        $responseData = [
            'code' => '0'
            ,'msg' => '작성 완료'
            // ,'data' => $insertBoard
            ,'data' => $boardModel->toArray()
        ];
        
        return response()->json($responseData, 200);
    }
}
