<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUserSendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this
            ->from('store-pass@obfall.co.jp', 'ストパス（Store-Pass）カスタマーサポート')
            ->subject('【自動返信】お問い合わせありがとうございます')
            ->view('contact.mail_user')
            ->with([
                'contact' => $this->contact,
            ]);
    }
}

