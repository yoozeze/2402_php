@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '로그인')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
    {{-- <body class="vh-100">
@endsection --}}

{{-- 메인 --}}
@section('main')
<!-- body class="vh-100-->
    <main class="log-main">
        <!-- main class="d-flex justify-content-center align-items-center h-75" -->
        <form action="{{route('post.login')}}" method="POST">
            @csrf
            <!-- <form style="300px;" action="./free.html"> -->
            <div class="mb-3">
                {{-- 에러 메세지 표시 --}}
                @if($errors->any())
                    <div class="form-text text-danger">
                        {{-- 에러 메세지 루프 처리 --}}
                        @foreach ($errors->all() as $error)
                            <span>{{$error}}</span>
                            <br>
                        @endforeach
                    </div>
                @endif
                <label for="email" class="form-label">이메일</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-dark">로그인</button>
        </form>
    </main>
@endsection