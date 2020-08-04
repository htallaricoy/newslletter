<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='テスト', $text='テストです。')
    {
      $this->title = sprintf('今月の社内報が公開されました', $name);
      $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user_register')
                    ->text('emails.user_register_plain')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                      ]);
    }
}
