<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:api')->get('/spotify/add/playlist', function (Request $request){
//    $currentuser = Auth::user();
//    $client = new Client([
//        'base_uri' => 'https://api.spotify.com/'
//    ]);
//
//    $uri = '';
//
//    try{
//        $res = $client->request('GET', 'https://api.spotify.com/v1/me/player/currently-playing', [
//            "headers" => [
//                "Authorization" => 'Bearer ' . $currentuser->authToken
//            ]
//        ]);
//
//        $body = json_decode($res->getBody());
//        $uri = $body->item->uri;
//
//    } catch (Exception $e){
//        $e->getMessage();
//    }
//
//    try {
//        $res = $client->request('POST', 'https://api.spotify.com/v1/playlists/{playlist_id}/tracks',
//            [
//                "headers" => [
//                    "Authorization" => 'Bearer ' . $currentuser->authToken
//                ],
//                "uris" => [ $uri ]
//            ]
//        );
//
//        $body = json_decode($res->getBody());
//        //TODO: may want to check this somewhere to know if you succeeded
//    } catch (GuzzleException $e) {
//        return $e->getMessage();
//    }
//    return true;
//});
