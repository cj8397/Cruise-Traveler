<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\UserSailing;
use App\UserEvent;
use App\Sailing;
use App\Stats;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Helpers\StatsHelper;
use App\Http\Controllers\UserEventsController;
use Illuminate\Support\Facades\DB;


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
        $stats = $this->GetStatsSummary($sailing_id); // should add a count in there
        if(!$userSailing->exists) { // doesnt exist
            // need to assign properties
            $userSailing->user_id = $user_id;
            $userSailing->sailing_id = $sailing_id;
            $userSailing->save();
            $success = "Joined the sailing.";
            return view('sailings.detail', compact('success', 'sailing', 'stats'));
            //return redirect::back();
        } else {
          //return redirect::back();
            $failure= "Already joined the sailing";
            return view('sailings.detail', compact('failure', 'sailing', 'stats'));
        }
    }

    // remove entry from bridge table
    public function LeaveSailing($sailing_id) {
        $user_id = Auth::User()->id;
        // creates key value pair based on variable names
        $sailing_id = (int)$sailing_id;
        $sailing = Sailing::find($sailing_id);
        $stats = $this->GetStatsSummary($sailing_id); // should add a count in there
        $conditions = compact('user_id', 'sailing_id');
        if( UserSailing::where($conditions)->exists()) {
            UserEvent::where($conditions)->delete();
            DB::table('user_sailings')->where('user_id', '=', $user_id)
                ->where('sailing_id', '=', $user_id)->delete();

            UserSailing::where($conditions)->delete();
                // ->delete();
            //return redirect::back();
            $success = "Left the sailing";
            return view('sailings.detail', compact('success', 'sailing', 'stats'));
        } else {
          //return redirect::back();
            $failure= "Already left the sailing";
            return view('sailings.detail', compact('failure', 'sailing', 'stats'));
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

    public function CalculateCityPercentages($sailing_id) {
        return $this->helper->CalculateDynamicPercentages('sailing_id', $sailing_id, 'city');
    }


//    public function GetStatsSummary($sailing_id) {
//
//        $fam = $this->CalculateFamilyPercentages($sailing_id);
//        $langs = $this->CalculateLangPercentages($sailing_id);
//        $sex = $this->CalculateSexPercentages($sailing_id);
//        $cities = $this->CalculateCityPercentages($sailing_id);
//        $countries = $this->CalculateCountryPercentages($sailing_id);
//        $ages = $this->CalculateAgePercentages($sailing_id);
//        $total = UserSailing::where(['sailing_id'=>$sailing_id])->count();
//
//        $summary = compact('fam', 'langs', 'sex', 'cities', 'countries', 'ages', 'total');
//        $stats = new Stats($summary);
//        return $stats;
//    }

    function GetStatsSummary($sailing_id) {

        $stats = DB::select("call sailing_stats_summary($sailing_id)")[0];

        $total = UserSailing::where(['sailing_id' => $sailing_id])->count();
        $ages = array();
        $ages['0-18'] = $this->CalculatePercentage($stats->youth, $total);
        $ages['18-25'] = $this->CalculatePercentage($stats->young, $total);
        $ages['25-35'] = $this->CalculatePercentage($stats->adult, $total);
        $ages['35-45'] = $this->CalculatePercentage($stats->middleaged, $total);
        $ages['45-55'] = $this->CalculatePercentage($stats->youngelders, $total);
        $ages['55-65'] = $this->CalculatePercentage($stats->elders, $total);
        $ages['65+'] = $this->CalculatePercentage($stats->seniors, $total);

        $fam = array();
        $fam['family'] = $this->CalculatePercentage($stats->family, $total);
        $fam['nonfamily'] = 100 - $fam['family'];

        $sex = array();
        $sex['male'] = $this->CalculatePercentage($stats->male, $total);
        $sex['female'] = 100 - $sex['male'];

        $cities = DB::select("call sailing_city_summary($sailing_id)")[0];
        $countries = DB::select("call sailing_country_summary($sailing_id)")[0];
        $langs = DB::select("call sailing_language_summary($sailing_id)")[0];

        $summary = compact('total','fam', 'sex', 'ages', 'langs', 'countries', 'cities');
        $summaryStats = new Stats($summary);
        return $summaryStats;
    }

    public function GetTop3Summary($sailing_id) {
        $total = UserSailing::where(['sailing_id'=>$sailing_id])->count();
        $fam = $this->CalculateFamilyPercentages($sailing_id);
        $langs = $this->CalculateLangPercentages($sailing_id);
        $cities = $this->CalculateCityPercentages($sailing_id);

        arsort($langs);
        $langs =array_slice($langs, 0, 3);
        arsort($cities);
        $cities =array_slice($cities, 0, 3);

        $summary = compact('total', 'fam', 'langs', 'cities');
        $stats = new Stats($summary);
        return $stats;
    }

    function CalculatePercentage($segment, $total) {
        return round (($segment / $total) * 100, 0);
    }
}
