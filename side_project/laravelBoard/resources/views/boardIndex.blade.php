@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '게시판')

{{-- 자바스크립트 파일 --}}
@section('script')
    <script src="/js/board.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 메인 --}}
@section('main')
<!-- body class="vh-100-->
    <div class="text-center mt-5 mb-5">
        <h1>{{$boardNameInfo->name}}</h1>
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="50" 
            height="50" 
            fill="currentColor" 
            class="bi bi-plus-circle-fill" 
            viewBox="0 0 16 16"
            data-bs-toggle="modal"
            data-bs-target="#modalInsert"
            >
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
        </svg>
    </div>

    <main class="main">
        @foreach ($data as $item)  
            <div class="card" id="card{{$item->id}}">
                <img src="{{$item->img}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="cat-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->content}}</p>
                    <button 
                        href="#" 
                        class="btn btn-primary my-btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetail"
                        value="{{$item->id}}"
                        >상세
                    </button>
                </div>
            </div>
        @endforeach
    </main>

    <!-- 상세 모달 -->
    <div class="modal" tabindex="-1" id="modalDetail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">개발자입니다.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>살려주세요.</p>
                <br>
                <img src="" class="card-img-top">
            </div>
            <div class="modal-footer justify-content-between">
                <div>
                    <button type="button" class="btn btn-warning" id="my-btn-update">수정</button>
                    <button type="button" class="btn btn-danger " id="my-btn-delete" data-bs-dismiss="modal">삭제</button>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            </div>
          </div>
        </div>
    </div>

    <!-- 작성 모달 -->
    <div class="modal" tabindex="-1" id="modalInsert">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{route('board.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="{{$boardNameInfo->type}}">
                <div class="modal-header">
                  <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요.">
                </div>
                <div class="modal-body">
                    <textarea class="form-control" cols="30" rows="10" name="content" placeholder="내용을 입력하세요."></textarea>
                    <br><br>
                    <input type="file" accept="image/*" name="file">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                  <button type="submit" class="btn btn-primary">작성</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection