<?php

namespace App\Mail;

use App\models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;

class AdminNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $department = DB::table('accounts')
                    ->select('department')
                    ->where('id', $this->post->user_id)
                    ->value('department');

        return $this->view('emails.admin_notify')
                    ->text('emails.admin_notify_plain')
                    ->subject('未公開の社内報記事が投稿されました')
                    ->with([
                        'post' => $this->post,
                        'department' => $department,
                      ]);
    }
}
