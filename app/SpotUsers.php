<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotUsers extends Model
{
    public $table = "spot_users";

    protected $fillable = [
        'spotUsername', 'loggedInSpotify', 'image_url', 'artist', 'song', 'user_uri', 'product', 'user_pfp', 'song_uri', 'artist_uri', 'progress_ms', 'duration', 'isPlaying'
    ];
}
