@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h3>{{ $title }}</h3>
    <br>

    {{-- @if ($userId !== 6)
        <a href='posts/create'>編集</a>
        <a href='posts/create'>削除</a>
    @endif --}}

    <div class="contents_wrapper">
        <p>{{ $message }}</p>
        <img src="/{{ $imagepath }}">
        <br>
        <button onclick="location.href='/posts'">戻る</button>
    </div>
</div>

@endsection
