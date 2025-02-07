<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public $data;

    // コンストラクタで受け取ったデータをプロパティに保存
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('新しいお問い合わせ')
                    ->view('emails.contact')  // メール本文用のビュー
                    ->with('data', $this->data);
    }
}