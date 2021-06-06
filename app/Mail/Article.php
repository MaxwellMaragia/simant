<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Article extends Mailable
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
        $subject = "New post alert";
        return $this->markdown('emails.post')
            ->subject($subject)
            ->with([
                'data'=>$this->data
            ]);


    }
}
