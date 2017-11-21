<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller {
  public function show(User $user) {
    $reviews = Review::where('user_id', $user->id)->latest()->get();
    return view('profiles.show', [
      'profileUser' => $user,
      'reviews' => $reviews
    ]);
  }
}