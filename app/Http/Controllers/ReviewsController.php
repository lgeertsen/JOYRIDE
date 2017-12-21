<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller {
  public function index() {
    $reviews = Review::latest()->get();

    return view('reviews.index', compact('reviews'));
  }

  public function create(User $user) {
    return view('reviews.create', compact('user'));
  }

  public function store(Request $request) {
    $this->validate($request, [
      'user_id' => 'required',
      'score' => 'required',
      'body' => 'required'
    ]);

    Review::create([
      'user_id' => request('user_id'),
      'writer_id' => auth()->id(),
      'score' => request('score'),
      'body' => request('body')
    ]);

    return redirect()->route('profile', ['user' => request('user_id')])
                     ->with('flash', 'Your review has been submitted successfully');
  }
}
