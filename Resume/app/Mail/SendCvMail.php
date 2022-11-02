<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCvMail extends Mailable
{
    use Queueable, SerializesModels;
    public $viewdata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($viewdata)
    {
        $this->viewdata = $viewdata;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailview',['data'=>$this->viewdata])
                    ->attach($this->viewdata['file']);
    }
}
