<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\UserSailing;
use Illuminate\Http\Request;
use App\Sailing;
use App\Event;
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
        // this works only if people are going to sailing
        // want to get them to only show sailings where pople are going in the end...
        $caribbeansailing = Sailing::where('destination', "Caribbean")->with('usersailings')->orderByRaw("RAND()")->first();
        $caribbeansailing['stats'] = $statsController->GetTop3Summary($caribbeansailing->id);
        $caribbeansailing['events'] = Event::with('userevent')->where('sailing_id',$caribbeansailing->id)->orderByRaw("RAND()")->take(3)->get();

        $mediterraneansailing = Sailing::where('destination', "Europe/Mediterranean")->with('usersailings')->orderByRaw("RAND()")->first();
        $mediterraneansailing['stats'] = $statsController->GetTop3Summary($mediterraneansailing->id);
        $mediterraneansailing['events'] = Event::with('userevent')->where('sailing_id',$mediterraneansailing->id)->orderByRaw("RAND()")->take(3)->get();

        $alaskasailing = Sailing::where('destination', "Alaska")->with('usersailings')->orderByRaw("RAND()")->first();
        $alaskasailing['stats'] = $statsController->GetTop3Summary($alaskasailing->id);
        $alaskasailing['events'] = Event::with('userevent')->where('sailing_id',$alaskasailing->id)->orderByRaw("RAND()")->take(3)->get();

        //return $caribbeansailing;
        return view('welcome')->with(['caribsail' => $caribbeansailing,
            'medsail' => $mediterraneansailing,
            'alassail' => $alaskasailing
        ]);
    }
}
