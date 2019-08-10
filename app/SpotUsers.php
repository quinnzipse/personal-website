<?php

namespace App;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SpotUsers extends Model
{
    public $table = "spot_users";

    protected $fillable = [
        'spotUsername', 'image_url', 'artist', 'song', 'user_uri', 'product', 'user_pfp', 'song_uri', 'artist_uri', 'progress_ms', 'duration', 'isPlaying'
    ];

    static function getToken(){

        $currentuser = Auth::user();

        $expires = Carbon::parse($currentuser->expires_at);
        if ($expires->lessThan(Carbon::now())) {
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
//                $currentuser->expiresAt = $body->expires_at;
                $currentuser->save();
            } catch (GuzzleException $e) {

            }
        }

        $currentUser = Auth::user();

        return $currentUser->authToken;
    }

}
