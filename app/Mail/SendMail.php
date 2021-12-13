<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $status,$_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $status,$_token)
    {
        $this->email = $email;
        $this->status = $status;
        $this->_token = $_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->status == "repass") {
            return $this->subject("Lấy lại mật khẩu")->view('emails.send_repass', ['email' => $this->email,'_token'=>$this->_token]);
        } else if($this->status=="register") {
            return $this->subject("Xác nhận tài khoản")->view('emails.send_register', ['email' => $this->email,'_token'=>$this->_token]);
        } else if($this->status=="repasscus"){
            return $this->subject("Lấy lại mật khẩu")->view('emails.send_repasscus', ['email' => $this->email,'_token'=>$this->_token]);
        }
    }
}
