@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h2>ようこそ {{$department}}</h2>
    <h1>社内報記事一覧画面</h1>
    <br>

    @if ($userId !== 6)
<button onclick="location.href='posts/create'">新規投稿</button>
    @endif
    <br><br>
    <div class="contents_wrapper">
        <table>
            @foreach ($items as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ date_create($item->created_at)->format('Y.m.d') }}</th>
                <th><a href="posts/{{$item->id}}">{{ $item->title }}</a></th>
                <th>{{ $item->department }}から</th>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
