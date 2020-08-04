@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h2>ようこそ {{ $department }}</h2>
    <h1>社内報記事一覧画面</h1>
    <br>

    @if ($userId !== 6)
    <button onclick="location.href='posts/create'">新規投稿</button>
    <button onclick="location.href='welcome'">トップへ</a></button>
    <button onclick="location.href='send'" style="background-color:red;color:white;">ML送信</a></button>
    @endif
    @if ($userId === 6)
    <button onclick="location.href='welcome'">トップへ</a></button>
    @endif
    <br><br>
    <div class="contents_wrapper">
        <table>
            @foreach ($items as $item)
            <tr>
                <th>第{{ $item->id }}報</th>
                <th>{{ date_create($item->created_at)->format('Y.m.d') }}</th>
                <th><a href="posts/{{ $item->id }}">{{ $item->title }}</a></th>
                <th>{{ $item->department }}から</th>
                @if ($userId !== 6)
                <th>
                    <form method="post">
                        {{ csrf_field() }}
                        @if ($userId === 1)
                        <button name="approval" value="{{ $item->id }}">
                        @endif
                        {{$item->is_released === 0 ? '△承認待ち' : '〇公開済み' }}
                        @if ($userId === 1)
                        </button>
                        @endif
                    </form>
                </th>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
