<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// --------------------------------------------------------------------------
// 라우터 정의
// --------------------------------------------------------------------------
// 문자열 리턴
Route::get('/hi', function() {
    return '안녕하세요.';
});
Route::get('/hello', function() {
    return 'HELLO';
});

// 뷰파일 리턴
Route::get('/myview', function() {
    return view('myView');
});

// --------------------------------------------------------------------------
// HTTP 메소드에 대응하는 라우터
// --------------------------------------------------------------------------
Route::get('/home', function() {
    return view('home');
});

Route::post('/home', function() {
    return 'POST HOME';    
});

Route::put('/home', function() {
    return 'PUT HOME';    
});

Route::delete('/home', function() {
    return 'DELETE HOME';    
});

// --------------------------------------------------------------------------
// 라우터에서 파라미터 제어
// --------------------------------------------------------------------------
// 파라미터 획득
Route::get('/param', function(Request $request) {
    return 'ID : '.$request->id. ', name : '.$request->name;
});
// http://localhost:8000/param?id=1234&name=홍길동

// 세그먼트 파라미터
Route::get('/segment/{id}/{gender}', function($id, $gender) {
    // ex) http://localhost:8000/segment/123
    return $id." : ".$gender;
    // ex) http://localhost:8000/segment/123/F
});
Route::get('/segment2/{id}/{gender}', function(request $request, $id) {
    return $request->id." : ".$id." : ".$request->gender;
    // ex) http://localhost:8000/segment2/123/F
});

// 세그먼트 파라미터 기본값 설정
Route::get('/segment3/{id?}', function($id = 'base') {
    return $id;
});

// --------------------------------------------------------------------------
// 라우터명 지정
// --------------------------------------------------------------------------
Route::get('/name', function() {
    return view('name');
});

// name(라우터명) 메소드를 이용
Route::get('/name/home/php505/root', function() {
    return 'URL 매우 길다';
})->name('name.root');

// --------------------------------------------------------------------------
// 뷰에 데이터 전달
// with(키, 값) 메소드를 이용해서 뷰에 전달
// 뷰에서는 $키 로 사용이 가능하다
// --------------------------------------------------------------------------
Route::get('/send', function() {
    $arr = [
        'id' => 1
        ,'email' => 'admin@admin.com'
    ];
    
    return view('send')
        ->with('gender', '무성')
        ->with('name', '홍길동')
        ->with('data', $arr);
    });
// Route::get('/send', function() {
//     return view('send')
//         ->with([
//             'gender' => '무성'
//             ,'name' => '홍길동'
//             ,'data' => $arr
//         ]);
// });

// --------------------------------------------------------------------------
// 컨트롤러 연결
// --------------------------------------------------------------------------
// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
Route::get('/test', [TestController::class, 'index']);

// TestController->create() : get
Route::get('/test/create', [TestController::class, 'create']);

// 리소스 라우터
Route::resource('task', TaskController::class);

// --------------------------------------------------------------------------
// 블레이드 템플릿 연습용
// --------------------------------------------------------------------------
Route::get('/edu', [EduController::class,'index']);

// --------------------------------------------------------------------------
// DB 관련 연습용
// --------------------------------------------------------------------------
Route::get('/user',[UserController::class,'eduUser']);
















// --------------------------------------------------------------------------
// 존재하지 않는 라우터 정의, 관습적으로 가장 하단에 작성함
Route::fallback(function() {
    return '없는 URL입니다.';
});
