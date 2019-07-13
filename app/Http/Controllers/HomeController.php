<?php

namespace App\Http\Controllers;

use App\SpotifySettings;
use App\SpotUsers;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use PHPUnit\Framework\Error\Error;

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

    public function localDataFetcher()
    {

        $publicUsers = array();
        $spotUsers = SpotUsers::all();

        foreach ($spotUsers as $user) {
            if (SpotifySettings::where('spotUsername', '=', $user->spotUsername)->get()[0]->plisten) {
                array_push($publicUsers, $user);
            }
        }

        return $publicUsers;

    }

    public function webDataFetcher(User $user) //This does not validate if it is a public listener
    {
        $client = new Client();

        $res = $client->request('GET', 'https://api.spotify.com/v1/me/player/currently-playing',
            ["headers" => [
                "Authorization" => 'Bearer ' . $user->authToken
            ]]
        );

        $body = json_decode($res->getBody());

        $oldUser = SpotUsers::where('spotify-userName', '=', $user->spotUsername)->get();

        if(sizeof($oldUser) > 0){
            $oldUser = $oldUser[0];
            $oldUser->image_url = $body->item->album->images[1]->url;
            $oldUser->artist = "";
            foreach ($body->item->artists as $artist){
                $oldUser->artist .= $artist->name . ":";
                $oldUser->artist_uri .= $artist->id . ":";
            }
            $oldUser->song = $body->item->name;
            $oldUser->song_uri = $body->item->external_urls->spotify;
            $oldUser->progress_ms = $body->progress_ms;
            $oldUser->duration = $body->item->duration_ms;
            $oldUser->isPlaying = $body->is_playing;

            $oldUser->save();
        }
        else{
            $res = $client->request('GET', 'https://api.spotify.com/v1/me');
            $body2 = json_decode($res->getBody());

            $newUser = new SpotUsers();
            $newUser->spotUsername = $user->spotUsername;
            $newUser->loggedInSpotify = $user->loggedInSpotify;
            $newUser->image_url = $body->item->album->images[1]->url;
            $newUser->artist = "";
            foreach ($body->item->artists as $artist){
                $newUser->artist .= $artist->name . ":";
                $newUser->artist_uri .= $artist->id . ":";
            }
            $newUser->song = $body->item->name;
            $newUser->user_uri = $body2->external_urls->spotify;
            $newUser->product = $body2->product;
            $newUser->user_pfp = $body2->images[0];
            $newUser->song_uri = $body->item->external_urls->spotify;
            $newUser->progress_ms = $body->progress_ms;
            $newUser->duration = $body->item->duration_ms;
            $newUser->isPlaying = $body->is_playing;

            $newUser->save();
        }



    }

    public function story()
    {
        return view('story', ['publicUsers' => $this->localDataFetcher()]);
    }

    public function smartBudgeting()
    {
        return view('smartbudgeting');
    }

}
