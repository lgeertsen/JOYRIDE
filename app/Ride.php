<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model {
  protected $guarded = [];

  public function creator() {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function car() {
    return $this->belongsTo(Car::class, 'car_id');
  }
}
