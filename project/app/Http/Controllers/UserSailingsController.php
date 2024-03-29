<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\UserSailing;
use App\UserDetails;
use App\UserEvent;
use App\Sailing;
use App\Stats;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Helpers\StatsHelper;
use App\Http\Controllers\UserEventsController;
use Illuminate\Support\Facades\DB;
use Cmgmyr\Messenger\Models\Thread;
use Laracasts\Flash\Flash;


class UserSailingsController extends Controller
{
    private $helper;
    public function __construct()
    {
        $this->middleware('auth',['except' => ['GetTop3Summary']]);
        $this->helper = new StatsHelper();
    }

    // create entry in bridge table
    public function JoinSailing($sailing_id) {

        $user_id = Auth::User()->id;
        if ($userDetail = UserDetails::where('user_id', $user_id)->whereNotNull('dob')->first()) {
        // need to check both columns....
        $userSailing = UserSailing::firstOrNew([
            'user_id' => $user_id,
            'sailing_id' => $sailing_id
        ]);
        $userSailing->save();
            Flash::success('Successfully joined a Sailing');
            return redirect()->action('SailingsController@GetSailing', [$sailing_id]);

      }else{
            Flash::error('Please update your account details!');
        return redirect('users/create');
      }
    }

    // remove entry from bridge table
    public function LeaveSailing($sailing_id) {
        $user_id = Auth::User()->id;
        // creates key value pair based on variable names
        if($uEvent = Sailing::with('usersailings','userevents')->where('id',$sailing_id)->first()){
            foreach($uEvent->usersailings->where('user_id', $user_id) as $currentUSailing){
                if($currentUSailing != null ){
                    $currentUSailing->delete();
                }
            }
            foreach($uEvent->userevents->where('user_id',$user_id) as $currentUEvent){
                if($currentUEvent != null){
                    $currentUEvent->delete();
                }
            }
            $uEvent->save();
            Flash::success('Successfully left the Sailing');
            return redirect()->action('SailingsController@GetSailing', [$sailing_id]);
        }else{

            Flash::error('Wasn\'t able to find that sailing');
            return redirect()->action('SailingsController@GetSailing', [$sailing_id]);

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

    function GetStatsSummary($sailing_id) {
        $total = UserSailing::where(['sailing_id' => $sailing_id])->count();
        $stats = DB::select("call sailing_stats_summary($sailing_id)")[0];

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

        $cities = $this->CalculateCityPercentages($sailing_id, $total);
        $countries = $this->CalculateCountryPercentages($sailing_id, $total);
        $langs = $this->CalculateLangPercentages($sailing_id, $total);

        $summary = compact('total','fam', 'sex', 'ages', 'langs', 'countries', 'cities');
        $summaryStats = new Stats($summary);
        return $summaryStats;
    }

    public function GetTop3Summary($sailing_id) {
        $total = UserSailing::where(['sailing_id'=>$sailing_id])->count();
        $fam = $this->CalculateFamilyPercentages($sailing_id, $total);
        $langs = $this->CalculateLangPercentages($sailing_id, $total);
        $cities = $this->CalculateCityPercentages($sailing_id, $total);

        arsort($langs);
        $langs =array_slice($langs, 0, 3);
        arsort($cities);
        $cities =array_slice($cities, 0, 3);

        $summary = compact('total', 'fam', 'langs', 'cities');
        $stats = new Stats($summary);
        return $stats;
    }

    function CalculatePercentage($segment, $total) {
        if($total != 0) {
            return round(($segment / $total) * 100, 0);
        } else {
            return null;
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

    public function CalculateLangPercentages($sailing_id, $total) {
        $langsDB = DB::select("call sailing_language_summary($sailing_id)");
        $langs = array();
        for($i = 0; $i < count($langsDB); $i ++) {
            $langs[$langsDB[$i]->language] = $this->CalculatePercentage($langsDB[$i]->count,$total);
        }
        return $langs;
    }

    public function CalculateCountryPercentages($sailing_id, $total) {
        $countriesDB = DB::select("call sailing_country_summary($sailing_id)");
        $countries = array();
        for($i = 0; $i < count($countriesDB); $i ++) {
            $countries[$countriesDB[$i]->country] = $this->CalculatePercentage($countriesDB[$i]->count,$total);
        }
        return $countries;
    }

    public function CalculateCityPercentages($sailing_id, $total) {
        $citiesDB = DB::select("call sailing_city_summary($sailing_id)");
        $cities = array();
        for($i = 0; $i < count($citiesDB); $i ++) {
            $cities[$citiesDB[$i]->city] = $this->CalculatePercentage($citiesDB[$i]->count,$total);
        }
        return $cities;
    }

}
