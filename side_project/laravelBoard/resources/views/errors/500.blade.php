@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '에러페이지')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
    {{-- <body class="vh-100">
@endsection --}}

{{-- 메인 --}}
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <div>
        <h2>500 에러</h2>
        <p>모든 항목을 작성해주세요.</p>
        <a href="{{route('board.index')}}">이전 페이지로 돌아가기</a>
    </div>
</main>
@endsection