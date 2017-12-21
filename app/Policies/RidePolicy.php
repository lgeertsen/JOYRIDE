<?php

namespace App\Policies;

use App\Ride;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RidePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Ride $ride) {
      return $ride->user_id == $user->id;
    }
}
