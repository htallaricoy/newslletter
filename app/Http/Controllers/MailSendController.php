<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailSendController extends Controller
{
    public function __invoke(){
        // テキストメール送信
        $mail_subject = "メールのタイトルテスト";
        $mail_content = "メールの本文です\nテスト";
        $to_email = "t_yajima_h@thinkone.jp";

        Mail::send([], [], function($message) use ($mail_subject, $mail_content, $to_email ) {
            $message->to( $to_email );
            $message->subject( $mail_subject );
            $message->setBody($mail_content);
        });

    	// $data = [];

    	// Mail::send('emails.user_register', $data, function($message){
    	//     $message->to('yajima_h@thinkone.jp', 'Test');
    	// });
    }
}
