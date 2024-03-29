<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Database\Eloquent\Model;
use App\UserSailing;
use App\UserEvent;
use Illuminate\Support\Facades\DB;

class StatsHelper
{

    public function CalculateBooleanPercentages($column, $id, $attribute)
    {

        if (starts_with($column, 'sailing')) {
            $users = UserSailing::where([$column => $id])->with('userdetails')->get();
        }
        if (starts_with($column, 'event')) {
            $users = UserEvent::where([$column => $id])->with('userdetails')->get();
        }
        if ($users != null) {
            $total = count($users);
            $count = 0;
            foreach ($users as $user) {
                $true = $user->userdetails->$attribute; //->userdetails->first()->sex;
                if ($true) {
                    $count += 1;
                }
            }
            if ($total != 0) {
                $percentTrue = $this->CalculatePercentage($count, $total);
            } else {
                return ['true' => 'no users in sailing', 'false' => 'nousers in sailing'];
            }
            $percentFalse = 100 - $percentTrue;
            return ['true' => $percentTrue, 'false' => $percentFalse];
        } else {
            return 'no users';
        }
    }

    function CalculatePercentage($segment, $total)
    {
        return round(($segment / $total) * 100, 0);
    }

    public function CalculateAgePercentages($column, $id)
    {
        if (starts_with($column, 'sailing')) {
            $users = UserSailing::where([$column => $id])->with('userdetails')->get();
        }
        if (starts_with($column, 'event')) {
            $users = UserEvent::where([$column => $id])->with('userdetails')->get();
        }
        $total = count($users);
        $youth = 0; // 0-18
        $young = 0; // 18-25
        $adult = 0; // 25-35
        $middle = 0; // 35 - 44
        $youngelder = 0; // 45 - 54
        $elder = 0; // 55 - 65
        $senior = 0; // 65+
        if ($total >= 0) {
            foreach ($users as $user) {
                $age = $user->userdetails->getAge();
                switch ($age) {
                    case ($age > 65):
                        $senior += 1;
                        break;
                    case ($age >= 55 && $age < 65):
                        $elder += 1;
                        break;
                    case ($age >= 45 && $age < 55):
                        $youngelder += 1;
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
            $agePercentages = array();
            $agePercentages['0-18'] = $this->CalculatePercentage($youth, $total);
            $agePercentages['18-25'] = $this->CalculatePercentage($young, $total);
            $agePercentages['25-35'] = $this->CalculatePercentage($adult, $total);
            $agePercentages['35-45'] = $this->CalculatePercentage($middle, $total);
            $agePercentages['45-55'] = $this->CalculatePercentage($youngelder, $total);
            $agePercentages['55-65'] = $this->CalculatePercentage($elder, $total);
            $agePercentages['65+'] = $this->CalculatePercentage($senior, $total);

            return $agePercentages;//compact('agePercentages');
        } else {
            return 'nosailings';
        }
    }

    public function CalculateDynamicPercentages($column, $id, $attribute)
    {
        if (starts_with($column, 'sailing')) {
            $users = UserSailing::where([$column => $id])->with('userdetails')->get();
        }
        if (starts_with($column, 'event')) {
            $users = UserEvent::where([$column => $id])->with('userdetails')->get();
        }
        if ($users != null) {
            $langs = array();
            foreach ($users as $user) { // dynamically create an array with counts
                $lang = $user->userdetails->$attribute;
                if (isset($langs[$lang])) {
                    $langs[$lang]++;
                } else {
                    $langs[$lang] = 1;
                }
            }
            $total = count($users);
            $percent = array();
            foreach ($langs as $lang => $count) {
                $percent[$lang] = $this->CalculatePercentage($count, $total);
            }
            return $percent;
        } else {
            return 'no users';
        }
    }
}