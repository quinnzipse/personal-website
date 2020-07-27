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

    public function music()
    {
        $tkn = SpotUsers::getToken();
        $settings = SpotifySettings::where('spotUsername', '=', 'qzipse-us')->get()[0];
        if ($settings->plisten) return view('music', ['authToken' => $tkn, 'settings' => $settings]);
        return view('music');
    }

    public function jillVal20()
    {
        return view('jill');
    }

    public function jill()
    {
//        try {
//            // Make a request to list all albums in the user's library
//            // Iterate over all the albums in this list
//            // Pagination is handled automatically
//            $response = $photosLibraryClient->listAlbums();
//            foreach ($response->iterateAllElements() as $album) {
//                // Get some properties of an album
//                $albumId = $album->getId();
//                $title = $album->getTitle();
//                $productUrl = $album->getProductUrl();
//                $coverPhotoBaseUrl = $album->getCoverPhotoBaseUrl();
//                // The cover photo media item id field may be empty
//                $coverPhotoMediaItemId = $album->getCoverPhotoMediaItemId();
//                $isWriteable = $album->getIsWriteable();
//                $totalMediaItems = $album->getTotalMediaItems();
//            }
//        } catch (\Google\ApiCore\ApiException $e) {
//            // Handle error
//        }
        return view('for_jill');
    }

}
