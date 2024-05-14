@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '로그인')

{{-- 회원 가입용 js --}}
@section('script')
    <script src="/js/regist.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
    {{-- <body class="vh-100">
@endsection --}}


{{-- 메인 --}}
@section('main')


    <body>
        <!-- <main class="log-main"> -->
            <main class="d-flex justify-content-center align-items-center h-75">
            <!-- <form action="./free.html"> -->
            <form style= "width : 300px" action="{{route('regist.store')}}" method="POST">
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
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">이메일</label>
                    <span id="print-chk-email"></span>
                    <button type="button" id="btn-chk-email" class="btn btn-secondary float-end">중복 확인</button>
                    <input type="text" class="form-control mt-3" id="email" name="email">   
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">비밀번호</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">이름</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" id="my-btn-complete" class="btn btn-dark" disabled="disabled">완료</button>
                <a href="{{route('get.login')}}" class="btn btn-secondary float-end">취소</a>
            </form>
        </main>
        <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
    </body>
@endsection