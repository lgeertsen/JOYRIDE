<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model {
  protected $guarded = [];

  public function person() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
