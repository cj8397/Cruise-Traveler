<?php

namespace App\Http\Controllers;

use App\Sailing;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Response;

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
        if ($event = Event::where('id', $event_id)->first()) {
            $this->GetAllParticipantsInEvent($event_id);
            $event->start_date = Carbon::parse($event->start_date)->format('l jS \\of F Y h:i:s A');
            $event->end_date = Carbon::parse($event->end_date)->format('l jS \\of F Y h:i:s A');
            return view('events.eventdetail')->with('event', $event);
        } else {
            return Redirect::back();
        }
    }

    protected function GetAllParticipantsInEvent($event_id)
    {
        dd($event_id);
    }

    protected function ShowCreateForm()
    {
        return view('events.createEventForm');
    }

    protected function CreateEvent(EventRequest $request)
    {

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $event = Event::create([
            'sailing_id' => $request->sailing_id,
            'title' => $request->title,
            'start_date' => $start,
            'end_date' => $end,
            'desc' => $request->desc,
            'location' => $request->location
        ]);
        return redirect()->action('EventsController@GetOneEvent', [$event->id]);
    }

}
