<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotifySettings extends Model
{
    public $table = "spotifySettings";

    protected $fillable = [
        'ulisten', 'plisten', 'uadd', 'padd', 'spotUsername'
    ];
}
