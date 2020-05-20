<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
		$this->token = $token;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->subject('メールアドレス変更のお知らせ')
			->view('mail.reset')
			->with(['token' => $this->token,
			]);
    }
}
