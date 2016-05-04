<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Sailing;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caribbeansailing = Sailing::where('destination', "Caribbean")->orderByRaw("RAND()")->first();
        $mediterraneansailing = Sailing::where('destination', "Europe/Mediterranean")->orderByRaw("RAND()")->first();
        $alaskasailing = Sailing::where('destination', "Alaska")->orderByRaw("RAND()")->first();

        //return $caribbeansailing;
        return view('welcome')->with(['caribsail' => $caribbeansailing,
            'medsail' => $mediterraneansailing,
            'alassail' => $alaskasailing
        ]);
    }
}
