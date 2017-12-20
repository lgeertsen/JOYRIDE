<?php

namespace App;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements BannableContract{
    use Notifiable;
    use Bannable;
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
