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

    return back();
  }
}
