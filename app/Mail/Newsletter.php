<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
//pass the data
    public $data;
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        //define the subject line
        $subject = "Confirm your Newsletter Subscription Now!";
        return $this->markdown('emails.confirm')
            ->subject($subject)
            ->with([
                'data'=>$this->data
            ]);


    }
}
