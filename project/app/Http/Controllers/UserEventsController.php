<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\UserEvent;
use App\UserSailing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Helpers\StatsHelper;
use Cmgmyr\Messenger\Models\Thread;
use Laracasts\Flash\Flash;

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
       if(UserSailing::where(['user_id'=>$user_id,'sailing_id' => $sailing_id])->first() != null ){
           // role = member// need to check both columns....
           $userE = UserEvent::firstOrNew([
               'sailing_id' => $sailing_id,
               'user_id' => $user_id,
               'event_id' => $event_id,
               'role' => 'Participant'
           ]);
           $userE->save();
           Flash::success('You Joined the EVENT!');
           return redirect()->action('EventsController@GetOneEvent',[$event_id]);
       }else{
           Flash::error('You are not registered for the sailing!');
           return redirect('/sailings/'.$sailing_id);       }
    }

    // remove entry from bridge table
    public function LeaveEvent($event_id)
    {
        $user_id = Auth::User()->id;
        $conditions = compact('user_id', 'event_id');
        if (UserEvent::where($conditions)->exists()) {
            UserEvent::where($conditions)->delete();
            Flash::success('You have left the EVENT!');
            return redirect('/sailings');//view('events.eventdetail', );
        } else {
            Flash::error('You are not registered for this Event!');
            return redirect('/sailings');
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

    public function CalculateAgePercentages($event_id)
    {
        return $this->helper->CalculateAgePercentages('event_id', $event_id);
    }

    public function CalculateCountryPercentages($event_id)
    {
        return $this->helper->CalculateDynamicPercentages('event_id', $event_id, 'country');
    }

    public function GetStatsSummary($event_id)
    {
        $fam = $this->CalculateFamilyPercentages($event_id);
        $lang = $this->CalculateLangPercentages($event_id);
        $sex = $this->CalculateSexPercentages($event_id);

        $summary = compact('fam', 'lang', 'sex');
        return $summary;
    }

    public function CalculateFamilyPercentages($event_id)
    {
        $percentages = $this->helper->CalculateBooleanPercentages('event_id', $event_id, 'family');
        return ['family' => $percentages['true'], 'nonfamily' => $percentages['false']];
    }

    public function CalculateLangPercentages($event_id)
    {
        return $this->helper->CalculateDynamicPercentages('event_id', $event_id, 'lang');
    }

    public function CalculateSexPercentages($event_id)
    {
        $percentages = $this->helper->CalculateBooleanPercentages('event_id', $event_id, 'sex');
        return ['male' => $percentages['true'], 'female' => $percentages['false']];
    }
}
