<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SampleNotification;


class MailSendController extends Controller
{
  public function SampleNotification()
  {
    $name = 'ララベル太郎';
    $text = 'これからもよろしくお願いいたします。';
    $to = 'yajima_h@thinkone.jp';
    Mail::to($to)->send(new SampleNotification($name, $text));
  }
}
