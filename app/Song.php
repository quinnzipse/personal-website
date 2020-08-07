<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $table = "songs";

    protected $fillable = [
        'name', 'data', 'listened_to', 'uri'
    ];
}
