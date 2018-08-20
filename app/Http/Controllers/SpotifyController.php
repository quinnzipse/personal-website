<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSettings;
use App\Providers\RouteServiceProvider;
use App\SpotifySettings;
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
    function const()
    {

    }

    function spotifyAuth()
    {
        //Don't make scopes null
        $scopes = 'user-read-private user-read-email user-read-currently-playing user-read-playback-state';
        $redirectURI = 'https://quinnzipse.me/spotify/auth';
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
            echo "Data not saved!";
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
            var_dump($e);
        }

        try {
            $set = SpotifySettings::where('spotUsername', '=', Auth::user()->spotUsername)->get();
            if (count($set) == 0) {
                $settings = new SpotifySettings();
                $settings->spotUsername = Auth::user()->spotUsername;
                $settings->save();
            } else $settings = $set[0];
        }catch (\mysqli_sql_exception $e){

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

    function refreshToken()
    {
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
            $currentuser = Auth::user();
            $currentuser->authToken = $access_token;
            $currentuser->save();
        } catch (GuzzleException $e) {

        }

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
        return view('dashboard/spotifyControl', ['isLoggedIn' => $isLoggedIn, 'username' => $username, 'settings' => $settings]);
    }

    function editSettings(EditSettings $request)
    {

        $count = SpotifySettings::where('spotUsername', '=', Auth::user()->spotUsername)->get();
        if(count($count) != 0) $settings = $count[0];

        //user
        if($request->get('ulisten') == 'on') $settings->ulisten = true;
        else $settings->ulisten = false;
        if($request->get('uadd') == 'on') $settings->uadd = true;
        else $settings->uadd = false;
        //public
        if($request->get('plisten') == 'on') $settings->plisten = true;
        else $settings->plisten = false;
        if($request->get('padd') == 'on') $settings->padd = true;
        else $settings->padd = false;

        $settings->save();

        return redirect(route('spotify.musicControl'));
    }

    function next(){

        return redirect(route('smartDashboard'));
    }
    function prev(){

        return redirect(route('smartDashboard'));
    }
    function pause(){

        return redirect(route('smartDashboard'));
    }
    function play(){

        return redirect(route('smartDashboard'));
}
}
