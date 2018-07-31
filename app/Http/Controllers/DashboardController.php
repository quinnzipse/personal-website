<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Foundation\Console\EventMakeCommand;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function const(){

    }

    function calendar(){
        $user_id = 1;
        return view('dashboard/calendar', ['event' => Event::where('user_id', '=', $user_id)->get()]);
    }

    function processAddEvent(AddEvent $request){
        $event = new Event();
        $event->name = $request->get('name');
        return redirect()->route('dashboard.calendar')->with('message', 'Event added successfully');
    }

    function addEvent(){
        return view('dashboard/addEvent');
    }

    function smartDash(){
        return view('dashboard/developing');
    }
    function dev(){
        return view('dashbaord/developing');
    }
}
