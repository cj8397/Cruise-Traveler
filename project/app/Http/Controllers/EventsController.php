<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Facades\Redirect;

class EventsController extends Controller
{
    //
    protected function GetAllEvents($sailing){
        if($events = Event::where('sailing_id', $sailing)){
            return view('events.list')->with('events', $events);
        } else {

            return Redirect::back();
        }
    }

    protected function GetOneEvent($event_id)
    {
        if ($event = Event::where('id', $event_id)) {
            return view('events.eventdetail');

        } else {
            return Redirect::back();
        }
    }

}
