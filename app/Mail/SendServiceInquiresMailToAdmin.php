<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendServiceInquiresMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

   public function __construct($service_inquiry)
    {
        $this->data = $service_inquiry; // Assign the contact data to the public property
    }

    public function build()
    {
        return $this->subject('New Service Inquires Submission')
                    ->view('front.email.service_inquires_admin') 
                    ->with('data', $this->data);
    }
}
 