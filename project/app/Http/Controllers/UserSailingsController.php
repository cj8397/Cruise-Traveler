<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\UserSailing;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helpers\StatsHelper;

class UserSailingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        $sailing = Sailing::where('id', $sailing_id)->first();
        $conditions = compact('user_id', 'sailing_id');
        if( UserSailing::where($conditions)->exists()) {
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
        $helper = new StatsHelper();
        $percentages = $helper->CalculateBooleanPercentages('sailing_id', $sailing_id, 'sex');
        return ['male'=>$percentages['true'], 'female'=>$percentages['false']];
    }

    public function CalculateFamilyPercentages($sailing_id) {
        $helper = new StatsHelper();
        $percentages = $helper->CalculateBooleanPercentages('sailing_id', $sailing_id, 'family');
        return ['family'=>$percentages['true'], 'nonfamily'=>$percentages['false']];
    }

    public function CalculateAgePercentages($sailing_id) {
        $helper = new StatsHelper();
        return $helper->CalculateAgePercentages('sailing_id', $sailing_id);
    }

    public function CalculateLangPercentages($sailing_id) {
        $users = UserSailing::with('userdetails')->where(['sailing_id'=>$sailing_id])->get();
        $langs = array();
        foreach($users as $user) { // dynamically create an array with counts
            $lang = $user->userdetails->lang;
            if(isset($langs[$lang])) {
                $langs[$lang]++;
            } else {
                $langs[$lang] = 1;
            }
        }
        $total = count($users);
        $percent = array();
        foreach($langs as $lang => $count) {
            $percent[$lang] = $this->CalculatePercentage($count, $total);
        }
        return $percent;
    }

    public function CalculateCountryPercentages($sailing_id) {
        $users = UserSailing::with('userdetails')->where(['sailing_id'=>$sailing_id])->get();
        $countries = array();
        foreach($users as $user) { // dynamically create an array with counts
            $country = $user->userdetails->country;
            if(isset($countries[$country])) {
                $countries[$country]++;
            } else {
                $countries[$country] = 1;
            }
        }
        $total = count($users);
        $percent = array();
        foreach($countries as $country => $count) {
            $percent[$country] = $this->CalculatePercentage($count, $total);
        }
        return $percent;
    }

    public function GetStatsSummary($sailing_id) {
        $fam = $this->CalculateFamilyPercentages($sailing_id);
        $lang = $this->CalculateLangPercentages($sailing_id);
        $sex = $this->CalculateSexPercentages($sailing_id);

        $summary = compact('fam', 'lang', 'sex');
        return $summary;
    }

    function CalculatePercentage($segment, $total) {
        return round (($segment / $total) * 100, 0);
    }
}
