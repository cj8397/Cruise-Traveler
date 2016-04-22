<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserEventsController extends Controller
{
    // create entry in bridge table
    public function JoinEvent($userID, $sailingID) {
        // role = member
    }

    // remove entry from bridge table
    public function LeaveEvent($userID) {

    }

    // getAllUsers goin to event
    public function GetAllUsers($sailingID) {

    }

    // get all events for a user
    public function GetAllEvents($userID) {

    }
}
