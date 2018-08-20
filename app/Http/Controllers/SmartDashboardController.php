<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmartDashboardController extends Controller
{
    function start(){
        //Create objects
        $currentUser = Auth::user();
        $client = new Client();

        //init variables
        $loggedInSpotify = false;
        $loggedInHue = false;
        $image_url = null;
        $body = null;

        //check if user is logged into spotify
        if($currentUser->authToken != ''){
            $loggedInSpotify = true;
            $res = $client->request('GET', 'https://api.spotify.com/v1/me/player/currently-playing',
                ["headers" => [
                    "Authorization" => 'Bearer ' . $currentUser->authToken
                ]]
            );
            if($res->getBody() == '') return view('dashboard/smartdash', ['loggedInSpotify' => $loggedInSpotify, 'loggedInHue' => $loggedInHue, 'image_url' => null, 'song_details' => null]);
                $body = json_decode($res->getBody());
                $image_url = $body->item->album->images[1]->url;
        }
        //TODO: add a way to set hue logged in to true once the feature is up
        return view('dashboard/smartdash', ['loggedInSpotify' => $loggedInSpotify, 'loggedInHue' => $loggedInHue, 'image_url' => $image_url, 'song_details' => $body]);
    }

    function getInfo(){
        $currentUser = Auth::user();

        $client = new Client();

            $res = $client->request('GET', 'https://api.spotify.com/v1/me/player/currently-playing',
                ["headers" => [
                    "Authorization" => 'Bearer ' . $currentUser->authToken
                ]]
            );

            $body = json_decode($res->getBody());
            $duration = $body->item->duration_ms;
            $progress = $body->progress_ms;
            $image0url = $body->item->album->images[1]->url;

            return view('dashboard/smartdash', ['image' => $image0url]);
    }
}
