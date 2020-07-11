@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h1>社内報記事詳細画面</h1>
    <br>

    {{-- @if ($userId !== 6)
        <a href='posts/create'>編集</a>
        <a href='posts/create'>削除</a>
    @endif --}}

    <div class="contents_wrapper">
        <a href='/posts'>戻る</a>
        <p>タイトル：{{ $title }}</p>
        <p>内容：{{ $message }}</p>
        <img src="/{{$imagepath}}">
    </div>
</div>

@endsection
