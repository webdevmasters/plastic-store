<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageAnswered extends Mailable {

    use Queueable, SerializesModels;

    public $result;

    /**
     * Create a new message instance.
     *
     * @param $result
     */
    public function __construct($result) {
        $this->result = $result;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this
            ->subject('Odgovor na Vaše pitanje')
            ->view('mail.message_answered')->with(['result'=>$this->result]);
    }
}
