{{-- 상속 --}}
{{-- 상속관계에 관한 문법은 가장 마지막에 출력 --}}
@extends('layout.layout')

{{-- @section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '에듀')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 범위를 지정해서 삽입 --}}
@section('main')
<main>
    <h1>자식 템플릿 메인</h1>
</main>
@endsection

@section('show')
    <h2>자식 show 입니다.</h2>
    <h3>자식 자식</h3>
@endsection

{{-- @if : 조건문 --}}
@if ($gender === 'F')
    <span>성별 : 여자</span> 
@elseif($gender === 'M')
    <span>성별 : 남자</span>
@else
    <span>성별 : 기타</span>
@endif
<hr>
{{-- 반복문 --}}
{{-- @for ~ @endfor : for 반복문 --}}
<h2>for문</h2>
@for ($i = 0; $i < 5; $i++)
    <span>for : {{$i}}</span>
@endfor
<hr>
{{-- @foreach ~ @endforeach : foreach 반복문 --}}
<h2>foreach문</h2>
{{-- $loop : foreach, forelse에서 루프의 정보를 담고 있는 자동으로 생성되는 객체 --}}
@foreach ($data as $key => $val)
    <h4>{{ $loop->count }}</h4>
    <h4> 남은 루프 횟수 : {{ $loop->remaining }}</h4>
    <span>{{ $key." : ".$val }}</span>
    <br>
@endforeach
<hr>
@foreach ($data as $key => $val)
    @if ($loop->odd)
        <span> {{$key." : ".$val}} <br></sapn>
    @else
        <span style="color: red;"> {{$key." : ".$val}} <br></span>
    @endif
@endforeach
<hr>
{{-- @forelse ~ @empty ~@endforelse : 루프를 할 데이터 길이가 1이상이면 @forelse의 처리,
                                    배열의 길이가 0이면 @empty의 처리를 합니다.
--}}
<h2>forelse 문</h2>
@forelse ($data2 as $key => $val)
    <span> {{$key." : ".$val}}</sapn>
    <br>
@empty
    <span>빈 배열입니다.</span>
@endforelse
<hr>