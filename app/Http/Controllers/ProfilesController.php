<?php

namespace App\Http\Controllers;

use App\Review;
use App\Ride;
use App\User;
use App\Car;
use Illuminate\Http\Request;

class ProfilesController extends Controller {
  public function show(User $user) {
    $reviews = Review::where('user_id', $user->id)->latest()->get();
    $rides = Ride::where('user_id', $user->id)->latest()->get();
    $cars = Car::where('user_id', $user->id)->get();

    return view('profiles.show', [
      'profileUser' => $user,
      'reviews' => $reviews,
      'rides' => $rides,
      'cars' => $cars,
    ]);
  }
}
