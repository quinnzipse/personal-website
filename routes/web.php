<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| TESTING QUINN TESTING
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Basic routes
Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/about', function (){
    return view('about');
})->name('about');
//TODO: Refresh Access token / logout of users spotify before allowing them to logout of QuinnZipse.me? Not sure what to do but something should change.
Route::get('/login', function () {
    return view( 'login');
})->name('login');
Route::get('/spotify', 'HomeController@story')->middleware('auth')->name('myStory');
//Route::get('/301', function (){
//    abort(301);
//});

Auth::routes();

//dashboard routes
Route::get('/underdevelopment', 'HomeController@dev')->middleware('auth')->name('development');
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
Route::get('/jill', 'HomeController@jill')->name('jill');
Route::get('/jill/valentines/2020', 'HomeController@jillVal20')->name('jillVal20');
Route::get('/music', 'SpotifyController@seeData')->name('music');

//Phillips Hue Routes
Route::get('/hue/controller', 'HueController@control')->middleware('auth')->name('hue.lightControl');
Route::get('/hue/controller/connect', 'HueController@connect')->middleware('auth')->name('hue.connect');

//Calendar Routes
Route::get('/calendar', 'DashboardController@calendar')->middleware('auth')->name('calendar.view');
Route::get('/addEvent', 'DashboardController@addEvent')->middleware('auth')->name('calendar.addEvent');
Route::post('/processAddEvent', 'DashboardController@processAddEvent')->middleware('auth')->name('calendar.process.addEvent');
Route::get('/editEvent/{event}', 'DashboardController@editEvent')->middleware('auth')->name('calendar.editEvent');
Route::post('/processEditEvent/{event}', 'DashboardController@processEditEvent')->middleware('auth')->name('calendar.process.editEvent');

//Spotify Routes
Route::get('/spotify/auth', 'SpotifyController@incomingAuth')->middleware('auth')->name('spotify.auth');
Route::get('spotify/reauth', 'SpotifyController@refreshToken')->middleware('auth')->name('spotify.reauth');
Route::get('/spotify/try', 'SpotifyController@spotifyAuth')->middleware('auth')->name('spotify.login');
Route::get('/spotify/logout', 'SpotifyController@logout')->middleware('auth')->name('spotify.logout');
Route::post('/spotify/settings/', 'SpotifyController@editSettings')->middleware('auth')->name('spotify.process.settings');
Route::get('/spotify/controller', 'SpotifyController@control')->middleware('auth')->name('spotify.musicControl');
//Stuff for smartdash
Route::get('spotify/prev', 'SpotifyController@prev')->middleware('auth')->name('spotify.musicControl.prev');
Route::get('spotify/next', 'SpotifyController@next')->middleware('auth')->name('spotify.musicControl.next');
Route::get('spotify/pause', 'SpotifyController@pause')->middleware('auth')->name('spotify.musicControl.pause');
Route::get('spotify/play', 'SpotifyController@play')->middleware('auth')->name('spotify.musicControl.play');

//Smartdashboard Routes
Route::get('/smartdashboard', 'SmartDashboardController@start')->middleware('auth')->name('smartDashboard');

//Info page for SmartBudgeting
Route::get('/smartbudgeting', "HomeController@smartBudgeting")->name('smartBudgeting');

//Test Routes NOT FOR PROD
Route::get('/test', 'SmartDashboardController@getInfo')->middleware('auth')->name('test');