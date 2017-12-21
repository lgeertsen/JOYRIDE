<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {
  protected $guarded = [];

  public function owner() {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function description() {
    return $this->color . ' ' . $this->brand . ' ' . $this->model;
  }
}
