<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
      $this->middleware('auth');
  }

  public function index(){
      if(auth()->user()->admin){
        $users = User::get();
        return view('admin.panel', ['users' => $users]);
      }else{
        return redirect('/');
      }
    }

  public function UserBan(User $user){
    $user->ban([
      'comment' => 'Ban'
    ]);
    return redirect('/admin');
  }

  public function UserBanTemp(User $user){
    $user->ban([
      'expired_at' => '+1 month'
    ]);
    return redirect('/admin');
  }

  public function UserUnban(User $user){
    $user->unban();
    return redirect('/admin');
  }
}
