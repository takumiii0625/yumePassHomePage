<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('store-pass@obfall.co.jp', 'お問い合わせ受付')
            ->subject('【通知】新しいお問い合わせがありました')
            ->view('contact.mail')
            ->with([
                'contact' => $this->contact,
            ]);
    }
}

