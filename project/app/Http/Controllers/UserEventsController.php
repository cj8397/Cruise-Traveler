<?php

namespace App\Http\Controllers;
use App\Event;
use App\Http\Requests;
use App\UserEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Helpers\StatsHelper;

class UserEventsController extends Controller
{
    private $helper;
    public function __construct()
    {
        $this->middleware('auth');
        $this->helper = new StatsHelper();
    }

    // create entry in bridge table
    public function JoinEvent($event_id, $sailing_id)
    {
        $user_id = Auth::User()->id;
        // role = member// need to check both columns....
        $userevent = UserEvent::firstOrNew([
            'user_id' => $user_id,
            'event_id' => $event_id,
        ]);
        $event = Event::where('id', $event_id)->first();

        if (!$userevent->exists) { // doesnt exist
            // need to assign properties
            $userevent->sailing_id = $event_id;
            $userevent->user_id = $user_id;
            $userevent->event_id = $event_id;
            $userevent->role = 'Participant';
            $userevent->save();
            $success = "Joined the event.";
            $members = UserEvent::all()->where('event_id',$event_id);
            return view('events.eventdetail', compact( 'members','event', 'success'));
        } else {
            $members = UserEvent::all()->where('event_id',$event_id);
            $failure = "Already joined the event.";
            return view('events.eventdetail', compact( 'members','event', 'failure'));
        }
    }

    // remove entry from bridge table
    public function LeaveEvent($event_id)
    { $user_id = Auth::User()->id;
        $conditions = compact('user_id', 'event_id');
        $event = Event::where('id', $event_id)->first();
        $members = UserEvent::all()->where('event_id',$event_id);
        if (UserEvent::where($conditions)->exists()) {
            UserEvent::where($conditions)->delete();
            $success = "Left the event.";
            $members = UserEvent::all()->where('event_id',$event_id);
            return view('events.eventdetail', compact( 'members','event', 'success'));
        } else {
            $members = UserEvent::all()->where('event_id',$event_id);
            $failure = "Not Participating In Event";
            return view('events.eventdetail', compact( 'members','event', 'failure'));
        }
        }

    // getAllUsers going to event
    // getAllUsers in a event
    public function GetAllUsers($event_id)
    {
        $users = UserEvent::where(['event_id' => $event_id])->get();
        if ($users != null) {
            return $users;
        } else {
            return 'no users';
        }
    }

    // female - 0, male - 1
    // going back and forth to DB many times, need to optimize after know its working
    public function CalculateSexPercentages($event_id) {
        $percentages = $this->helper->CalculateBooleanPercentages('event_id', $event_id, 'sex');
        return ['male'=>$percentages['true'], 'female'=>$percentages['false']];
    }

    public function CalculateFamilyPercentages($event_id) {
        $percentages = $this->helper->CalculateBooleanPercentages('event_id', $event_id, 'family');
        return ['family'=>$percentages['true'], 'nonfamily'=>$percentages['false']];
    }

    public function CalculateAgePercentages($event_id) {
        return $this->helper->CalculateAgePercentages('event_id', $event_id);
    }

    public function CalculateLangPercentages($event_id) {
        return $this->helper->CalculateDynamicPercentages('event_id', $event_id, 'lang');
    }

    public function CalculateCountryPercentages($event_id) {
        return $this->helper->CalculateDynamicPercentages('event_id', $event_id, 'country');
    }

    public function GetStatsSummary($event_id) {
        $fam = $this->CalculateFamilyPercentages($event_id);
        $lang = $this->CalculateLangPercentages($event_id);
        $sex = $this->CalculateSexPercentages($event_id);

        $summary = compact('fam', 'lang', 'sex');
        return $summary;
    }
}
