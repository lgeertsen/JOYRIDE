<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model {
  protected $guarded = [];

  protected static function boot() {
    parent::boot();

    static::deleting(function($ride) {
      $ride->passengers->each->delete();
    });
  }

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

  public function fullPrice() {
    return round($this->price * $this->distanceToKm());
  }

  public function distanceToKm() {
    return round($this->distance / 1000);
  }

  public function durationToText() {
    $hours = floor($this->duration / 3600);
    $minutes = round(($this->duration - ($hours * 3600)) / 60);

    return "{$hours}h {$minutes}min";
  }
}
