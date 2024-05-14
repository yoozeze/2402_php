<?php

namespace App\Providers;

use App\Models\BoardName;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // 프로바이더 생성 명령어
    // php artisan make:provider 프로바이더명
    // 커스텀 프로바이더는 config>app.php에 'providers'항목에 설정해줘야함

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 모든 뷰에 게시판 이름 테이블 정보를 전달하는 처리
        // * : 모든 정보를 의미 
        View::composer('*', function($view) {
            $result = BoardName::orderBy('type')->get();
            $view->with('globalBoardNameInfo', $result);
        });
    }
}
