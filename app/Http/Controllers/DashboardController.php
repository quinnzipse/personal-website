<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\AddEvent;
use App\Http\Requests\EditEvent;
use App\User;
use Illuminate\Foundation\Console\EventMakeCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function const(){

    }

    function calendar(){
        $user_id = Auth::user()->id;
        return view('dashboard/calendar/calendar', ['event' => Event::where('user_id', '=', $user_id)->get()]);
    }

    function processAddEvent(AddEvent $request){
        $event = new Event();
        $event->name = $request->get('name');
        $event->type = $request->get('type');
        $event->date = $request->get('date');
        $event->time = $request->get('time');
        $event->user_id = Auth::user()->id;

        $event->save();
        return redirect()->route('calendar.view');
    }

    function addEvent(){
        return view('dashboard/calendar/addEvent');
    }

    function editEvent(Event $event){
        return view('dashboard/calendar/editEvent', ['event' => $event]);
    }

    function processEditEvent(EditEvent $request, Event $event){
        //This is currently hard coded, but will eventually be the id of the current user logged in.
        $event->name = $request->get('name');
        $event->type = $request->get('type');
        $event->date = $request->get('date');
        $event->time = $request->get('time');

        $event->save();
        return redirect()->route('calendar.view');
    }

    function dev(){
        return view('dashbaord/developing');
    }
}
