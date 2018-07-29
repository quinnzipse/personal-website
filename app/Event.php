<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'time', 'date', 'type', 'prioritys'
    ];

    protected $hidden = [
        'id'
    ];
}
