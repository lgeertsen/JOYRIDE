<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstConnectionController extends Controller {
  public function index() {
    return view('cars.create');
  }
}
