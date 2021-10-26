<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailData, $platformData;
    public function __construct($mailData, $platformData)
    {
        $this->mailData = $mailData;
        $this->platformData = $platformData;
    }

    public function build()
    {
        $mailData = $this->mailData;
        $platformData = $this->platformData;

        $defaultMail = $this->from($platformData['email'])
                            ->subject($mailData['subject']);

        if (array_key_exists('cc', $mailData) && $mailData['cc']) {
            $defaultMail->cc($mailData['cc']);
        }

        $defaultMail->view('mail.contents.default-mail', compact('mailData', 'platformData'));

        return $defaultMail;
//        return $this->from('sales@importir.org')
//                    ->subject($mailData['subject'])
//                    if () {}
//                    ->view('mail.contents.default-mail', compact('mailData', 'platformData'));
    }
}
