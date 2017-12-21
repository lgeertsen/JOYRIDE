<?php

namespace App\Http\Controllers;

use App\Ride;
use Illuminate\Http\Request;

class PassengersController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  public function store(Ride $ride) {
    $ride->addPassenger();

    app('App\Http\Controllers\MailsController')->newPassenger($ride);

    if(request()->wantsJson()) {
      return response([], 204);
    }

    return redirect("/rides/{$ride->creator->id}/{$ride->id}");
  }

  public function destroy(Ride $ride) {
    $ride->passengers()->where('user_id', auth()->id())->delete();

    app('App\Http\Controllers\MailsController')->cancelPassenger($ride);

    if(request()->wantsJson()) {
      return response([], 204);
    }

    return redirect("/rides/{auth()->id()}/{$ride->id}");
  }
}
