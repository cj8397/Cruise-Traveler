<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Sailing;
use App\UserSailing;
use App\Http\Controllers\UserSailingsController;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statsController = new UserSailingsController();

        // $caribbeansailing = Sailing::where('destination', "Caribbean")->with('usersailings')->orderByRaw("RAND()")->first();
        $caribean = UserSailing::orderByRaw("RAND()")->with('sailing')->first();
        $caribbeansailing = $caribean->sailing;

        $caribbeansailing['stats'] = $statsController->GetTop3Summary($caribbeansailing->id);

        $mediterraneansailing = Sailing::where('destination', "Europe/Mediterranean")->with('usersailings')->orderByRaw("RAND()")->first();
        $mediterraneansailing['stats'] = $statsController->GetTop3Summary($mediterraneansailing->id);

        $alaskasailing = Sailing::where('destination', "Alaska")->with('usersailings')->orderByRaw("RAND()")->first();
        $alaskasailing['stats'] = $statsController->GetTop3Summary($alaskasailing->id);

        //return $caribbeansailing;
        return view('welcome')->with(['caribsail' => $caribbeansailing,
            'medsail' => $mediterraneansailing,
            'alassail' => $alaskasailing
        ]);
    }
}
