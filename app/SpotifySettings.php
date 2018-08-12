<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotifySettings extends Model
{
    public $table = "SpotifySettings";

    protected $fillable = [
        'ulisten', 'plisten', 'uadd', 'padd', 'spotUsername'
    ];
}
