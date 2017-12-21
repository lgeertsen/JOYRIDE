<?php

namespace App\Http\Controllers;

use App\User;
use App\Ride;
use App\Passenger;

use App\Mail\Welcome;
use App\Mail\NewPassengerMail;
use App\Mail\CancelPassengerMail;
use App\Mail\CancelRide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailsController extends Controller{
  public function welcome(User $user) {
    Mail::to($user)->send(new Welcome($user));
  }

  public function newPassenger(Ride $ride) {
    $passenger = auth()->user();
    Mail::to($ride->creator)->send(new NewPassengerMail($ride, $passenger));
  }

  public function cancelPassenger(Ride $ride) {
    $passenger = auth()->user();
    Mail::to($ride->creator)->send(new CancelPassengerMail($ride, $passenger));
  }

  public function deleteRide(Passenger $passenger) {
    $ride = Ride::find($passenger->ride_id);
    $user = User::find($passenger->user_id);
    Mail::to($user)->send(new CancelRide($ride, $user));
  }
}
