<?php

namespace App\Http\Controllers;

use App\SpotifySettings;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/home');
    }

    public function story(){
        $currentUser = User::where('spotUsername', '=', 'qzipse-us')->get()[0];
        $spotSettings = SpotifySettings::where('spotUsername', '=', 'qzipse-us')->get()[0];
        $client = new Client();

        //init variables
        $loggedInSpotify = false;
        $image_url = null;
        $body = null;

        //check if user is logged into spotify & if they want the public to see what they are listening to
        if($currentUser->authToken != '' && $spotSettings->plisten){

            //If user is logged in, get his current status from spotify
            $loggedInSpotify = true;
            $res = $client->request('GET', 'https://api.spotify.com/v1/me/player/currently-playing',
                ["headers" => [
                    "Authorization" => 'Bearer ' . $currentUser->authToken
                ]]
            );

            //Logged in but not playing anything
            if($res->getBody() == '') return view('story', ['loggedInSpotify' => $loggedInSpotify, 'image_url' => null, 'song_details' => null]);

            //parse the spotify data
            $body = json_decode($res->getBody());
            $image_url = $body->item->album->images[1]->url;
        }
        //TODO: add a way to set hue logged in to true once the feature is up
        return view('story', ['loggedInSpotify' => $loggedInSpotify, 'image_url' => $image_url, 'song_details' => $body]);
    }

}
