<?php

namespace App\Mail;

use App\User;
use App\Ride;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPassengerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $passenger;
    public $ride;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ride $ride, User $passenger)
    {
        $this->ride = $ride;
        $this->passenger = $passenger;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->markdown('emails.newPassenger');
    }
}
