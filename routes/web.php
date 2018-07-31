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
Route::get('/underdevelopment', 'HomeController@dev')->middleware('auth')->name('development');
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
Route::get('/hue/controller', 'HueController@control')->middleware('auth')->name('lightControl');
Route::get('/spotify/controller', 'SpotifyController@control')->middleware('auth')->name('musicControl');
Route::get('/smartdashboard', 'DashboardController@smartDash')->middleware('auth')->name('smartDashboard');

//Calendar Routes
Route::get('/calendar', 'DashboardController@calendar')->middleware('auth')->name('calendar');
Route::get('/addEvent', 'DashboardController@addEvent')->middleware('auth')->name('addEvent');