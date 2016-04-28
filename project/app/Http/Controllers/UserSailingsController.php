<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\UserSailing;
use App\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


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
        $userSailings = UserSailing::where(['sailing_id' => $sailing_id])->with('user')->get();
        $total = count($userSailings);
        $male = 0;
        foreach($userSailings as $userSailing) {
            $male = $userSailing->user->with('userdetails')
                ->find($userSailing->user_id)->userdetails
                    ->first()->sex;

            if($male) {
                $male += 1;
            }
        }
        if($total != 0) {
            $percentMale = $this->CalculatePercentage($male, $total);
        } else {
            return 'no users in sailing';
        }
        $percentFemale = 100 - $percentMale;
        return ['male'=>$percentMale, 'female'=>$percentFemale];
    }

    public function CalculateFamilyPercentages($sailing_id) {
        $userSailings = UserSailing::where(['sailing_id' => $sailing_id])->with('user')->get();
        $total = count($userSailings);
        $count = 0;
        foreach($userSailings as $userSailing) {
            $family = $userSailing->user->with('userdetails')
                ->find($userSailing->user_id)->userdetails
                    ->first()->family;

            if($family) {
                $count += 1;
            }
        }
        if($total != 0) {
            $percentFamilies = $this->CalculatePercentage($count, $total);
        } else {
            return 'no users in sailing';
        }
        $percentNone = 100 - $percentFamilies;
        return ['family'=>$percentFamilies, 'nofamily'=>$percentNone];
    }

    public function CalculateAgePercentages($sailing_id) {
        $userSailings = UserSailing::where(['sailing_id' => $sailing_id])->with('user')->get();
        $total = count($userSailings);
        $youth = 0; // 0-18
        $young = 0; // 18-25
        $adult = 0; // 25-35
        $middle = 0; // 35 - 45
        $elder = 0; // 45 - 65
        $senior = 0; // 65+
        if($total >= 0) {
            foreach ($userSailings as $userSailing) {
                $age = $userSailing->user->with('userdetails')
                        ->find($userSailing->user_id)->userdetails
                            ->first()->getAge();
                switch ($age) {
                    case ($age > 65):
                        $senior += 1;
                        break;
                    case ($age >= 45 && $age < 65):
                        $elder += 1;
                        break;
                    case ($age >= 35 && $age < 45):
                        $middle += 1;
                        break;
                    case ($age >= 25 && $age < 35):
                        $adult += 1;
                        break;
                    case ($age >= 18 && $age < 25):
                        $young += 1;
                        break;
                    case ($age >= 0 && $age < 18):
                        $youth += 1;
                        break;
                }
            }
            $percentYouth = $this->CalculatePercentage($youth, $total); // 0-18
            $percentYoung = $this->CalculatePercentage($young, $total);
            $percentAdult = $this->CalculatePercentage($adult, $total);
            $percentMiddle = $this->CalculatePercentage($middle, $total);
            $percentElder = $this->CalculatePercentage($elder, $total);
            $percentSenior = $this->CalculatePercentage($senior, $total);
            return compact('percentYouth','percentYoung','percentAdult', 'percentMiddle', 'percentElder', 'percentSenior');
        } else {
            return 'nosailings';
        }
    }

    public function CalculateLangPercentages($sailing_id) {
        $users = UserSailing::with('user')->where(['sailing_id'=>$sailing_id])->get();
        $langs = array();
        foreach($users as $user) { // dynamically create an array with counts
            $lang = $user->user->with('userdetails')
                        ->find($user->user_id)->userdetails
                            ->first()->lang;
            if(isset($langs[$lang])) {
                $langs[$lang]++;
            } else {
                $langs[$lang] = 1;
            }
        }

        $total = UserSailing::where(['sailing_id'=>$sailing_id])->count();
        $percent = array();
        foreach($langs as $lang => $count) {
            $percent[$lang] = $this->CalculatePercentage($count, $total);
        }
        return $percent;
    }

    public function CalculateCountryPercentages($sailing_id) {
        $users = UserSailing::with('user')->where(['sailing_id'=>$sailing_id])->get();
        $countries = array();
        foreach($users as $user) { // dynamically create an array with counts
            $country = $user->user->with('userdetails')
                ->find($user->user_id)->userdetails
                ->first()->country;
            if(isset($countries[$country])) {
                $countries[$country]++;
            } else {
                $countries[$country] = 1;
            }
        }

        $total = UserSailing::where(['sailing_id'=>$sailing_id])->count();
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
