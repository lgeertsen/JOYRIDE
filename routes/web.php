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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/userban/{user}', 'AdminController@UserBan')->name('banuser');


Route::get('/cars', 'CarsController@index')->name('cars');
Route::get('/cars/new', 'CarsController@create');
Route::post('/cars', 'CarsController@store');

Route::get('/rides', 'RidesController@index')->name('rides');
Route::get('/rides/new', 'RidesController@create')->name('rides.new');
Route::post('/rides', 'RidesController@store');
Route::get('/rides/{user}/{ride}', 'RidesController@show')->name('ride.show');

Route::get('/reviews', 'ReviewsController@index')->name('reviews');
Route::get('/reviews/{user}/new', 'ReviewsController@create');
Route::post('/reviews', 'ReviewsController@store');

Route::post('/passengers/{ride}', 'PassengersController@store');

// OAuth Routes
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
