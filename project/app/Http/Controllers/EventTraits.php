<?php
/**
 * Created by PhpStorm.
 * User: Cheng
 * Date: 2016-04-25
 * Time: 4:38 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\UserSailing;
use Illuminate\Support\Facades\Auth;
use App\UserEvent;
use App\Event;
use App\Sailing;

trait EventTraits
{
    public function GetAllEvents($user_id)
    {
//        $user_id = Auth::User()->id;
        $events = UserEvent::where(['user_id' => $user_id])->get();
        if ($events != null) {
            return $events;
        } else {
            return 'no events';
        }
    }

    public function GetAllSailings($user_id)
    {
        //$user_id = Auth::User()->id;
        $sailings = UserSailing::all()->where('user_id', $user_id);
        if ($sailings != null) {
            return $sailings;
        } else {
            return 'no sailings';
        }
    }

    public function GetSailingEvents($sailing_id)
    {
        $sailingEvents = Event::all()->where('sailing_id', $sailing_id);
        if ($sailingEvents != null) {
            return $sailingEvents;
        } else {
            return 'no events in this sailing';
        }
    }

    public function GetSailingDetail($sailing_id)
    {
        $sailing = Sailing::where(['id' => $sailing_id])->get();
        return $sailing;
    }
}