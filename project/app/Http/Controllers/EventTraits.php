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

trait EventTraits
{
    function GetAllEvents($user_id)
    {
//        $user_id = Auth::User()->id;
        $events = UserEvent::where(['user_id' => $user_id])->get();
        if ($events != null) {
            return $events;
        } else {
            return 'no events';
        }
    }
}