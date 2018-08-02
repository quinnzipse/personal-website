<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\AddEvent;
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
        $user_id = 1;

        $event = new Event();
        $event->name = $request->get('name');
        $event->type = $request->get('type');
        $event->date = $request->get('date');
        $event->time = $request->get('time');
        $event->user_id = $user_id;

        $event->save();
        return redirect()->route('calendar.view');
    }

    function addEvent(){
        return view('dashboard/addEvent');
    }

    function editEvent(){
        return view('dashboard/editEvent');
    }

    function smartDash(){
        return view('dashboard/developing');
    }
    function dev(){
        return view('dashbaord/developing');
    }
}
