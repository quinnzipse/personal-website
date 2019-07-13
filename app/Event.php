<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = "event";

    protected $fillable = [
        'name', 'dateTime', 'type'
    ];

    protected $hidden = [
        'event_id', 'user_id'
    ];
}