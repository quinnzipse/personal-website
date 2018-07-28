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
})->name('home');
Route::get('/login', function () {
    return view( 'login');
})->name('login');

Auth::routes();

//dashboard routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calendar', 'DashboardController@calendar')->name('calendar');
Route::get('/hue/controller', 'HueController@control')->name('lightControl');
Route::get('/spotify/controller', 'SpotifyController@control')->name('musicControl');
Route::get('/smartdashboard', 'DashboardController@smartDash')->name('smartDashboard');