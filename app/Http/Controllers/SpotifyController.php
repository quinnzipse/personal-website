<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSettings;
use App\Providers\RouteServiceProvider;
use App\SpotifySettings;
use App\SpotUsers;
use App\User;
use bar\baz\source_with_namespace;
use Couchbase\UserSettings;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\override;

class SpotifyController extends Controller
{
    function spotifyAuth()
    {
        //Don't make scopes null
        $scopes = 'user-read-private user-read-recently-played user-read-email user-read-currently-playing ' .
            'user-read-playback-state playlist-modify-public playlist-read-private playlist-modify-private playlist-read-collaborative';
        $redirectURI = route('spotify.auth');
        return redirect('https://accounts.spotify.com/authorize?response_type=code&client_id=' . env('SpotClientID') . '&scope=' . URLEncode($scopes) . '&redirect_uri=' . URLEncode($redirectURI));
    }

    function incomingAuth(Request $request)
    {
        $code = $request->get('code');
        //$state = $request->get('state');
        $client = new Client([
            'base_uri' => 'https://api.spotify.com/'
        ]);
        try {
            $res = $client->request('POST', 'https://accounts.spotify.com/api/token',
                ["headers" => [
                    "Authorization" => 'Basic ' . base64_encode(env('SpotClientID') . ':' . env('SpotClientSecret'))
                ],
                    "form_params" => [
                        'code' => $code,
                        "grant_type" => "authorization_code",
                        'redirect_uri' => route('spotify.auth')
                    ]
                ]
            );

            $body = json_decode($res->getBody());
            $access_token = $body->access_token;
            $refresh_token = $body->refresh_token;
            $currentuser = Auth::user();
            $currentuser->authToken = $access_token;
            $currentuser->refreshToken = $refresh_token;
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }

        try {
            $currentuser = Auth::user();
            $res = $client->request('GET', 'https://api.spotify.com/v1/me',
                ["headers" => [
                    "Authorization" => 'Bearer ' . $currentuser->authToken
                ]]
            );

            $body = json_decode($res->getBody());
            $spotifyUsername = $body->id;
            $currentuser->spotUsername = $spotifyUsername;
            $currentuser->save();
        } catch (GuzzleException $e) {
            var_dump($e->getMessage());
        }

        try {
            $set = SpotifySettings::where('spotUsername', '=', Auth::user()->spotUsername)->get();
            if (count($set) == 0) {
                $settings = new SpotifySettings();
                $settings->spotUsername = Auth::user()->spotUsername;
                $settings->save();
            } else $settings = $set[0];
        } catch (\mysqli_sql_exception $e) {

        }

        return redirect(route('spotify.musicControl', ['settings' => $settings]));
    }

    function logout()
    {
        $currentuser = Auth::user();
        $currentuser->authToken = '';
        $currentuser->refreshToken = '';
        $currentuser->spotUsername = '';

        $currentuser->save();

        return redirect(route('spotify.musicControl'));
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

        $oldUser = SpotUsers::where('spotUsername', '=', $user->spotUsername)->get();

        if (sizeof($oldUser) > 0) {
            $oldUser = $oldUser[0];
            $oldUser->image_url = $body->item->album->images[1]->url;
            $oldUser->artist = "";
            foreach ($body->item->artists as $artist) {
                $oldUser->artist .= $artist->name . ":";
                $oldUser->artist_uri .= $artist->id . ":";
            }
            $oldUser->song = $body->item->name;
            $oldUser->song_uri = $body->item->external_urls->spotify;
            $oldUser->progress_ms = $body->progress_ms;
            $oldUser->duration = $body->item->duration_ms;
            $oldUser->isPlaying = $body->is_playing;

            $oldUser->save();
        } else {
            $res = $client->request('GET', 'https://api.spotify.com/v1/me',
                ['headers' => [
                    "Authorization" => 'Bearer ' . $user->authToken
                ]]
            );
            $body2 = json_decode($res->getBody());

            $newUser = new SpotUsers();
            $newUser->spotUsername = $user->spotUsername;
            $newUser->image_url = $body->item->album->images[1]->url;
            $newUser->artist = "";
            foreach ($body->item->artists as $artist) {
                $newUser->artist .= $artist->name . ":";
                $newUser->artist_uri .= $artist->id . ":";
            }
            $newUser->song = $body->item->name;
            $newUser->user_uri = $body2->external_urls->spotify;
            $newUser->product = $body2->product;
            $newUser->user_pfp = $body2->images[0]->url;
            $newUser->song_uri = $body->item->external_urls->spotify;
            $newUser->progress_ms = $body->progress_ms;
            $newUser->duration = $body->item->duration_ms;
            $newUser->isPlaying = $body->is_playing;

            $newUser->save();
        }

    }

    function fetchRecentData()
    {
        $quinns_code = User::get()[0]->authToken;
        $client = new Client();
        try {
            $res = $client->request('get', 'https://api.spotify.com/v1/me/player/recently-played',
                ['headers' => [
                    'Authorization' => 'Bearer ' . $quinns_code
                ],
                ]
            );
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }

        return json_decode($res->getBody());
    }

    function fetchNowPlaying()
    {
        $quinns_code = User::get()[0]->authToken;
        $client = new Client();
        try {
            $res = $client->request('get', 'https://api.spotify.com/v1/me/player/currently-playing', ['headers' => [
                'Authorization' => 'Bearer ' . $quinns_code
            ]]);
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
        return $res->getBody();
    }

    function search_songs(Request $request) {
        $auth_token = User::get()[0]->authToken;
        $client = new Client();
        try {
            $uri = 'https://api.spotify.com/v1/search?q=' . urlencode($request->search_term) . '&type=artist,track';
            $res = $client->request('get', $uri, ['headers' => [
                'Authorization' => 'Bearer ' . $auth_token
            ]]);
        } catch (GuzzleException $e) {
            return 'failed';
        }

        return $res->getBody();
    }

    function add_to_queue(Request $request){
        $auth_token = User::get()[0]->authToken;
        $client = new Client();
        try {
            $res = $client->request('post', "https://api.spotify.com/v1/me/player/queue?uri=$request->uri", ['headers' => [
                'Authorization' => 'Bearer ' . $auth_token
            ]]);
        } catch (GuzzleException $e){
            exit(500);
        }
        exit($res->getStatusCode());
    }

    function seeData()
    {
        return view('music', ['recently_played' => $this->fetchRecentData(), 'now_playing' => json_decode($this->fetchNowPlaying())]);
    }

    function refreshToken()
    {
        $currentuser = Auth::user();

        $client = new Client();
        try {
            $res = $client->request('POST', 'https://accounts.spotify.com/api/token',
                ["headers" => [
                    "Authorization" => 'Basic ' . base64_encode(env('SpotClientID') . ':' . env('SpotClientSecret'))
                ],
                    "form_params" => [
                        "grant_type" => "refresh_token",
                        'refresh_token' => Auth::user()->refreshToken
                    ]
                ]
            );

            $body = json_decode($res->getBody());
            $access_token = $body->access_token;
            $currentuser->authToken = $access_token;
            $currentuser->save();
        } catch (GuzzleException $e) {

        }

        $user = User::where('name', '=', $currentuser->name)->get()[0];

        $this->webDataFetcher($user);

        return redirect(route('spotify.musicControl'));
    }

    function control()
    {
        $currentuser = Auth::user();
        $username = $currentuser->spotUsername;
        $isLoggedIn = false;
        $settings = new SpotifySettings();
        if ($currentuser->authToken != '') {
            $isLoggedIn = true;
            $set = SpotifySettings::where('spotUsername', '=', Auth::user()->spotUsername)->get();
            if (count($set) != 0) $settings = $set[0];
        }
        return view('dashboard/spotifyControl', ['isLoggedIn' => $isLoggedIn, 'username' => $username, 'settings' => $settings, 'authToken' => Auth::user()->authToken]);
    }

    function editSettings(EditSettings $request)
    {

        $count = SpotifySettings::where('spotUsername', '=', Auth::user()->spotUsername)->get();
        if (count($count) != 0) $settings = $count[0];

        //user
        if ($request->get('ulisten') == 'on') $settings->ulisten = true;
        else $settings->ulisten = false;
        if ($request->get('uadd') == 'on') $settings->uadd = true;
        else $settings->uadd = false;
        //public
        if ($request->get('plisten') == 'on') $settings->plisten = true;
        else $settings->plisten = false;
        if ($request->get('padd') == 'on') $settings->padd = true;
        else $settings->padd = false;

        $settings->d_playlist = $request->get('d_playlist');

        $settings->save();

        return redirect(route('spotify.musicControl'));
    }

    function next()
    {

        return redirect(route('smartDashboard'));
    }

    function prev()
    {

        return redirect(route('smartDashboard'));
    }

    function pause()
    {

        return redirect(route('smartDashboard'));
    }

    function play()
    {

        return redirect(route('smartDashboard'));
    }
}
