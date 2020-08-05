@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h3>{{ $title }}</h3>
    <br>
    <div class="contents_wrapper">
        <p>{{ $message }}</p>
        @isset ($imagepath)
        <img src="/{{ $imagepath }}">
        @endisset
        <br>
        <button onclick="location.href='/posts'">戻る</button>
    </div>
</div>

@endsection
