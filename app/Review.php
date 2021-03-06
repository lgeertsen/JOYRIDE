<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
  protected $guarded = [];
  
  public function owner() {
    return $this->belongsTo(User::class, 'user_id');
  }
  
    public function creator() {
    return $this->belongsTo(User::class, 'writer_id');
  }
}
