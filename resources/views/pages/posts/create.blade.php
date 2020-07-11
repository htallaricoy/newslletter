@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h2>ようこそ</h2>
    <h1>社内報記事投稿画面</h1>
    <br>

    <div class="contents_wrapper">

        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="subject">件名</label>
            <input type="text" name="title" style="width:500px;">
            <br>
            <label for="content">内容</label>
            <textarea rows="10" name="message" style="width:500px;"></textarea>
            <div class="element_wrap"> <label>画像ファイルの添付</label> <input type="file" name="image_title"></div>
            <br><br>
            <button name="submitted" type="submit">投稿</button>
        </form>

    </div>
</div>

@endsection
