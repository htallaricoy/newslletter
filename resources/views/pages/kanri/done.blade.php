@extends('layouts.app')
@section('content')

        <?php
            mb_language("Japanese");
            mb_internal_encoding("UTF-8");

            $to = "yajima_h@thinkone.jp";
            $title = "社内報投稿記事の申請があります";
            $content = '社内報記事投稿の申請がありました。URLより確認してください。https://mottomotto.jp/poh.php';

            if(mb_send_mail($to, $title, $content)){
                echo "申請が完了しました。";
            } else {
                echo "申請に失敗しました。開発者に問い合わせてください。";
            }

        ?>


        <a href="https://mottomotto.jp/shanai/signup.php">完了</a>

        @endsection
