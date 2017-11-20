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


Route::get('/cars', 'CarsController@index')->name('cars');
Route::get('/cars/new', 'CarsController@create');
Route::post('/cars', 'CarsController@store');

Route::get('/rides', 'RidesController@index')->name('rides');
Route::get('/rides/new', 'RidesController@create');
Route::post('/rides', 'RidesController@store');


// OAuth Routes
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');