<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels; 
	
	public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->data['email'];
		
		$fname = $this->data['fname'];
		$lname = $this->data['lname'];
		
		$fullname= $fname.' '.$lname;
		
		return $this->from($email, $fullname)->subject('Application Submitted from Worldwide Travel & Tourism Website - Contact Us')->view('emails.contact-message')->with('data', $this->data);
        //return $this->view('view.name');
    }
}
