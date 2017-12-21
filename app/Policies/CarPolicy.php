<?php

namespace App\Policies;

use App\Car;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Car $car) {
      return $car->user_id == $user->id;
    }
}
