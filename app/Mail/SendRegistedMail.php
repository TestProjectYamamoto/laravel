<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRegistedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(string $content)
    {
        $this->content = $content;
    }


    public function build(): Object
    {
        return $this->from('localhost@example.com')
                    ->subject('本登録完了のお知らせ')
                    ->view('sendmailRegisted')
                    ->with(['content' => $this->content]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
