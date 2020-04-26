<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromotionalMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    public $subject;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject='Test Message', $message='Test Message')
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userArr = $this->user->toArray();
        $subject = $this->short_code($this->subject, $userArr);
        $message =  $this->short_code($this->message, $userArr);

        return $this->subject($subject)->view('mail.promo', ['user' => $this->user, 'msg' => $message]);
    }


    private function short_code($msg, $user){
        $ua = $user;
        $tokens = ['fname', 'lname', 'email', 'mobile', 'dob', 'profession', 'orgname', 'whatsapp', 'address', 'city', 'pincode', 'state', 'country'];

        $message = $msg;
        foreach($tokens as $token){
            $message = str_ireplace('['.$token.']', $ua[$token], $message);
        }

        return $message;
    }
}
