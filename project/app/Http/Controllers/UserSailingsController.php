<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\UserSailing;
use App\UserEvent;
use App\Sailing;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helpers\StatsHelper;
use App\Http\Controllers\UserEventsController;

class UserSailingsController extends Controller
{
    private $helper;
    public function __construct()
    {
        $this->middleware('auth');
        $this->helper = new StatsHelper();
    }

    // create entry in bridge table
    public function JoinSailing($sailing_id) {

        $user_id = Auth::User()->id;
        // need to check both columns....
        $userSailing = UserSailing::firstOrNew([
            'user_id' => $user_id,
            'sailing_id' => $sailing_id
        ]);
        $sailing = Sailing::where('id', $sailing_id)->first();
        if(!$userSailing->exists) { // doesnt exist
            // need to assign properties
            $userSailing->user_id = $user_id;
            $userSailing->sailing_id = $sailing_id;
            $userSailing->save();
            $success = "Joined the sailing.";
            return view('sailings.detail', compact('success', 'sailing'));
            //return redirect::back();
        } else {
          //return redirect::back();
            $failure= "Already joined the sailing";
            return view('sailings.detail', compact('failure', 'sailing'));
        }
    }

    // remove entry from bridge table
    public function LeaveSailing($sailing_id) {
        $user_id = Auth::User()->id;
        // creates key value pair based on variable names
        $sailing = Sailing::find($sailing_id);
        $conditions = compact('user_id', 'sailing_id');
        if( UserSailing::where($conditions)->exists()) {
            UserEvent::where($conditions)->delete();
            UserSailing::where($conditions)->delete();
            //return redirect::back();
            $success = "Left the sailing";
            return view('sailings.detail', compact('success', 'sailing'));
        } else {
          //return redirect::back();
            $failure= "Already left the sailing";
            return view('sailings.detail', compact('failure', 'sailing'));
        }
    }

    // getAllUsers in a sailing
    public function GetAllUsers($sailing_id) {
        $users = UserSailing::where(['sailing_id' => $sailing_id])->get();
        if ($users != null) {
            return $users;
        } else {
            return 'no users';
        }
    }

    // female - 0, male - 1
    // going back and forth to DB many times, need to optimize after know its working
    public function CalculateSexPercentages($sailing_id) {
        $percentages = $this->helper->CalculateBooleanPercentages('sailing_id', $sailing_id, 'sex');
        return ['male'=>$percentages['true'], 'female'=>$percentages['false']];
    }

    public function CalculateFamilyPercentages($sailing_id) {
        $percentages = $this->helper->CalculateBooleanPercentages('sailing_id', $sailing_id, 'family');
        return ['family'=>$percentages['true'], 'nonfamily'=>$percentages['false']];
    }

    public function CalculateAgePercentages($sailing_id) {
        return $this->helper->CalculateAgePercentages('sailing_id', $sailing_id);
    }

    public function CalculateLangPercentages($sailing_id) {
        return $this->helper->CalculateDynamicPercentages('sailing_id', $sailing_id, 'lang');
    }

    public function CalculateCountryPercentages($sailing_id) {
        return $this->helper->CalculateDynamicPercentages('sailing_id', $sailing_id, 'country');
    }

    public function GetStatsSummary($sailing_id) {
        $fam = $this->CalculateFamilyPercentages($sailing_id);
        $lang = $this->CalculateLangPercentages($sailing_id);
        $sex = $this->CalculateSexPercentages($sailing_id);

        $summary = compact('fam', 'lang', 'sex');
        return $summary;
    }

}
