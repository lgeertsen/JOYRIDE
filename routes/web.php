<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/userban/{user}', 'AdminController@UserBan')->name('userban');
Route::get('/userbantemp/{user}', 'AdminController@UserBanTemp')->name('userbantemp');
Route::get('/userunban/{user}', 'AdminController@UserUnban')->name('userunban');
Route::get('/banned', 'AdminController@banned');

Route::group(['middleware' => 'forbid-banned-user'], function() {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/cars/new','CarsController@create');
  Route::get('/cars', 'CarsController@index')->name('cars');
  Route::post('/cars', 'CarsController@store');
  Route::patch('/cars/{car}', 'CarsController@update');
  Route::delete('/cars/{car}', 'CarsController@destroy');

  Route::get('/rides', 'RidesController@index')->name('rides');
  Route::get('/rides/new', 'RidesController@create')->name('rides.new');
  Route::post('/rides', 'RidesController@store');
  Route::get('/rides/{user}/{ride}', 'RidesController@show')->name('ride.show');
  Route::delete('/rides/{ride}', 'RidesController@destroy');

  Route::get('/reviews', 'ReviewsController@index')->name('reviews');
  Route::get('/reviews/{user}/new', 'ReviewsController@create');
  Route::post('/reviews', 'ReviewsController@store');

  Route::post('/passengers/{ride}', 'PassengersController@store');
  Route::delete('/passengers/{ride}', 'PassengersController@destroy');

  Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
  Route::get('/profile', function() {
    return redirect()->route('profile', ['user' => auth()->user()->id]);
  });
});

// OAuth Routes
// Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
// Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/first_connection', 'FirstConnectionController@index');

Route::get('/mailable/1', function () {
    $user = App\User::find(1);

    return new App\Mail\Welcome($user);
});

Route::get('/mailable/2', function () {
    $ride = App\Ride::find(1);
    $passenger = App\User::find(2);

    return new App\Mail\newPassengerMail($ride, $passenger);
});

Route::get('/mailable/3', function () {
    $ride = App\Ride::find(1);
    $passenger = App\User::find(2);

    return new App\Mail\cancelPassengerMail($ride, $passenger);
});

Route::get('/mailable/4', function () {
    $ride = App\Ride::find(1);
    $user = App\User::find(2);

    return new App\Mail\cancelRide($ride, $user);
});
