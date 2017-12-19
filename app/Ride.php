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

  public function scopeFilter($query, $filters) {
    return $filters->apply($query);
  }

  public function passengers() {
    return $this->hasMany(Passenger::class, 'ride_id');
  }

  public function addPassenger() {
    $attributes = ['user_id' => auth()->id()];

    if(! $this->passengers()->where($attributes)->exists()) {
      return $this->passengers()->create($attributes);
    }
  }
}
