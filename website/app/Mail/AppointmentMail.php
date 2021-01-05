<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    
    use Queueable, SerializesModels;
    public $key;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($key)
  {
      $this->key = $key;
  }
    public function build()
    {
        if($this->key=="ACCEPT")
        {
            return $this->from('pkore8756@gmail.com')->subject("Your appointment has been accepted")->view('EmailTemplate/accept_appointments');
        }
        if($this->key=="REJECT")
        {
            return $this->from('pkore8756@gmail.com')->subject("Your appointment has been rejected")->view('EmailTemplate/reject_appointments');
        }
    }
}
