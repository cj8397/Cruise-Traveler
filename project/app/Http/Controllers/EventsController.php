<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;

class EventsController extends Controller
{
    //
    protected function GetAllEvents($sailing){
        if($events = Event::where('sailing_id', $sailing)){
            return view('events.list')->with('events', $events);
        };
    }

}
