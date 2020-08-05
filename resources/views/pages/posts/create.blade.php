@extends('layouts.app')
@section('content')

<div class="wrapper">

    <h1>社内報記事投稿画面</h1>
    <br>

    <div class="contents_wrapper">

        <p>※記事作成に時間を要する場合はバックアップをとりながら作業してください。<br>（120分経過後に「投稿」ボタンを押下するとセッションが切れ、ログイン画面へ戻ります。）</p>

        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="subject">件名 <span style="background-color:red;color:white;padding:3px;font-size:13px;">必須</span></label><br>
            <input type="text" name="title" style="width:500px;">
            <br>
            <label for="content">内容 <span style="background-color:red;color:white;padding:3px;font-size:13px;">必須</span></label><br>
            <textarea rows="10" name="message" style="width:500px;"></textarea>
            <div class="element_wrap"> <label>画像ファイルの添付</label><br>
                <input type="file" name="image_title"></div>
            <br><br>
            <button name="submitted" type="submit">投稿</button>
        </form>

    </div>
</div>

@endsection
