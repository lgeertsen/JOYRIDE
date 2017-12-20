<?php

namespace App\Http\Controllers;

use App\User;

use App\Mail\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailsController extends Controller{
  public function welcome(User $user) {
    Mail::to($user)->send(new Welcome($user));
  }
}
