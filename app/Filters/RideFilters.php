<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class RideFilters extends Filters {
  protected $filters = ['start', 'destination', 'date'];

  protected function start($city) {
    return $this->builder->where('start', $city);
  }
  
  protected function destination($city) {
    return $this->builder->where('destination', $city);
  }
  
  protected function date($date) {
    return $this->builder->where('date', $date);
  }
}
