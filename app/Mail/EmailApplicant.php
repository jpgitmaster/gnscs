<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailApplicant extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $applied;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $applied)
    {
        $this->user = $user;
        $this->applied = $applied;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@247globalnursingsolution.com', '24/7 GNSCS')
            ->subject('Congrats you are now successully applied!')
            ->view('tpls.emails.email_applicant');
    }
}
