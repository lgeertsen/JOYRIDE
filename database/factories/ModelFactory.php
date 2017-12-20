<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'birthday' => $faker->date($format = 'Y-m-d', $max = '-18 years'),
        'address' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'user_id' => function() {
          return factory('App\User')->create()->id;
        },
        'brand' => $faker->word,
        'model' => $faker->word,
        'color' => $faker->colorName,
    ];
});

$factory->define(App\Ride::class, function (Faker $faker) {
    $car = factory('App\Car')->create();

    return [
        'user_id' => $car->owner->id,
        'car_id' => $car->id,
        'seats' => $faker->randomDigitNotNull,
        'start' => $faker->city,
        'destination' => $faker->city,
        'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 1 years'),
        'time' => $faker->time($format = 'H:i:s'),
    ];
});

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'user_id' => function() {
          return factory('App\User')->create()->id;
        },
        'writer_id' => function() {
          return factory('App\User')->create()->id;
        },
        'score' => $faker->randomDigitNotNull,
        'body' => $faker->text
    ];
});

$factory->define(App\UserBan::class, function (Faker $faker) {
    return [
        'user_id' => 3
    ];
});
