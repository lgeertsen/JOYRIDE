<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model {
  protected $guarded = [];

  protected static function boot() {
    parent::boot();

    static::deleting(function($passenger) {
      app('App\Http\Controllers\MailsController')->deleteRide($passenger);
    });
  }

  public function person() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
