<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSupport extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $resume;
    public $applied;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($resume, $user, $applied)
    {
        $this->resume = $resume;
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
            ->subject('You have 1 Jobseeker applied!')
            ->view('tpls.emails.email_support');
    }
}
