<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 로그인 관련
Route::post('/login', [UserController::class, 'login']);
Route::middleware('my.auth')->post('/logout', [UserController::class, 'logout']);

// 보드 관련
Route::middleware('my.auth')->get('/board/{id}/list',[BoardController::class, 'index']);

// 유효하지 않는 Path
Route::fallback(function() {
    return response()->json(['code' => 'E90']);
});