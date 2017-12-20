<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'firstName', 'lastName', 'email', 'password',
    // ];

    protected $guarded = ['admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cars() {
        return $this->hasMany(Car::class);
    }

    public function banned() {
      return $this->hasOne(UserBan::class);
    }

    public function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }
}
