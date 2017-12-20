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

Route::get('/home', [
  'uses' => 'HomeController@index',
  'middleware' => 'forbid-banned-user',
])->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/userban/{user}', 'AdminController@UserBan')->name('userban');
Route::get('/userbantemp/{user}', 'AdminController@UserBanTemp')->name('userbantemp');
Route::get('/userunban/{user}', 'AdminController@UserUnban')->name('userunban');
Route::get('/banned', 'AdminController@banned');


Route::get('/cars', [
  'uses' => 'CarsController@index',
  'middleware' => 'forbid-banned-user',
])->name('cars');

Route::get('/cars/new', [
  'uses' => 'CarsController@create',
  'middleware' => 'forbid-banned-user',
]);

Route::post('/cars', [
  'uses' => 'CarsController@store',
  'middleware' => 'forbid-banned-user',
]);

Route::get('/rides', [
  'uses' => 'RidesController@index',
  'middleware' => 'forbid-banned-user',
])->name('rides');

Route::get('/rides/new', [
  'uses' => 'RidesController@create',
  'middleware' => 'forbid-banned-user',
])->name('rides.new');

Route::post('/rides', [
  'uses' => 'RidesController@store',
  'middleware' => 'forbid-banned-user',
]);

Route::get('/rides/{user}/{ride}', [
  'uses' => 'RidesController@show',
  'middleware' => 'forbid-banned-user',
])->name('ride.show');

Route::get('/reviews', [
  'uses' => 'ReviewsController@index',
  'middleware' => 'forbid-banned-user',
])->name('reviews');

Route::get('/reviews/{user}/new', [
  'uses' => 'ReviewsController@create',
  'middleware' => 'forbid-banned-user',
]);

Route::post('/reviews', [
  'uses' => 'ReviewsController@store',
  'middleware' => 'forbid-banned-user',
]);

Route::post('/passengers/{ride}', [
  'uses' => 'PassengersController@store',
  'middleware' => 'forbid-banned-user',
]);

// OAuth Routes
// Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
// Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/first_connection', 'FirstConnectionController@index');

Route::get('/mailable', function () {
    $user = App\User::find(1);

    return new App\Mail\Welcome($user);
});

Route::get('/sendemail', function() {
  $data = array(
    'name' => "JOYRIDE",
  );

  Mail::send('emails.welcome', $data, function($message) {
    $message->from('lee@joyride.com', 'Lee @ JOYRIDE');
    $message->to('lee.geertsen@hotmail.com')->subject('Welcome to JOYRIDE');
  });

  return "Your email has been sent successfully";
});
