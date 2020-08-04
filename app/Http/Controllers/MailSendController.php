<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SampleNotification;


class MailSendController extends Controller
{
  public function SampleNotification()
  {
    $name = 'シンクワン社内報';
    $text = '今月の社内報が公開されました。以下リンクより確認してください。';
    $to = 'yajima_h@thinkone.jp';
    Mail::to($to)->send(new SampleNotification($name, $text));

    return view('emails/sended');
  }
}
