<?php

namespace App\Http\Controllers;

use App\SpotifySettings;
use App\SpotUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SpotifyController;

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
        return redirect(route('spotify.musicControl'));
    }

    public function localDataFetcher()
    {

        $publicUsers = array();
        $quinn = '';
        $spotUsers = SpotUsers::all();

        foreach ($spotUsers as $user) {
            if (SpotifySettings::where('spotUsername', '=', $user->spotUsername)->get()[0]->plisten) {
                if ($user->spotUsername != 'qzipse-us') array_push($publicUsers, $user);
                else $quinn = $user;
            }
        }

        return array($quinn, $publicUsers);

    }

    public function story()
    {
        //$users = $this->localDataFetcher();

        $tkn = SpotUsers::getToken();
        $username = Auth::user()->spotUsername;
        $settings = SpotifySettings::where('spotUsername', '=', $username)->get()[0];
        return view('storyNew', ['authToken' => $tkn, 'settings' => $settings]);

        //return view('story', ['quinn' => $users[0], 'publicUsers' => $users[1]]);
    }

    public function smartBudgeting()
    {
        return view('smartbudgeting');
    }

    public function jill(){
        return view('jill');
    }

}
