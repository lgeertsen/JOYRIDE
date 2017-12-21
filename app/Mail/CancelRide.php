<?php

namespace App\Mail;

use App\Ride;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelRide extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ride $ride, User $user)
    {
      $this->ride = $ride;
      $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->markdown('emails.cancelRide');
    }
}
