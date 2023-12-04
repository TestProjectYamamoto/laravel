<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUnregisteredsMail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(string $content)
    {
        $this->content = $content;
    }


    public function build()
    {
        return $this->from('localhost@example.com')
                    ->subject('仮登録完了のお知らせ')
                    ->view('sendmailUnregistered')
                    ->with(['content' => $this->content]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
