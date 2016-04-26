@extends('layouts.scrolling')

@section('content')
    <img class="img-responsive" src="/images/cruiseship.jpg">
    <div class="container">
        <div class="panel panel-default row col-md-6 col-xs-12">
            <div class="panel-body col-md-12 col-xs-12">
                <img class="img-responsive img-circle" src="/images/profilepic.png" width="200" height="200">
            </div>
            <div class="col-md-12 col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item"><h4>Email: </h4>{{ Auth::user()->email }}</li>
                    {{--<li class="list-group-item">{{ Auth::user()->email }}</li>--}}
                    <li class="list-group-item"><h4>First Name: </h4>{{ Auth::user()->first }}</li>
                    {{--<li class="list-group-item">{{ Auth::user()->first }}</li>--}}
                    <li class="list-group-item"><h4>Last Name: </h4>{{ Auth::user()->last }}</li>
                    {{--<li class="list-group-item">{{ Auth::user()->last }}</li>--}}
                    <li class="list-group-item"><h4>Date of Birth: </h4>{{ Auth::user()->dob }}</li>
                    {{--<li class="list-group-item">{{ Auth::user()->dob }}</li>--}}
                    <li class="list-group-item"><h4>Gender: </h4>
                        @if (Auth::user()->sex === 0)
                            Male
                        @else
                            Female
                        @endif
                    </li>
                </ul>
                <input class="btn" type="submit" value="More Details">
            </div>
            <div></div>
        </div>

        <div class="panel panel-default row col-md-5 col-md-offset-1 col-xs-12">
            <div class="row col-md-12 col-xs-12">
                <div class="panel-heading">
                    <h2>Sailings & Events</h2>
                </div>

                @if(isset($usersailings))
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($usersailings as $sailings)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h4>Sailing ID</h4>
                                        {!! $sailings->sailing_id !!}
                                    </li>
                                </ul>
                                @foreach($sailingevents as $events)
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5>Event: {!! $events->title !!}</h5>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Location:</strong> {!! $events->location !!}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Start:</strong> {!! $events->start_date !!}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>End:</strong> {!! $events->end_date !!}
                                        </li>
                                    </ul>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            {{--<div class="panel-body">
                <div class="row col-md-6 col-xs-6">
                    <ul class="list-group">
                        <li class="list-group-item">Party</li>
                    </ul>
                </div>
                <div class="row col-md-12 col-xs-12"></div>
                <div class="row col-md-6 col-xs-6"></div>
                <div class="row col-md-6 col-xs-6">
                    <ul class="list-group">
                        <li class="list-group-item">Party</li>
                    </ul>
                </div>
                <div class="row col-md-6 col-xs-6">
                    <ul class="list-group">
                        <li class="list-group-item">Party</li>
                    </ul>
                </div>
                <div class="row col-md-12 col-xs-12"></div>
                <div class="row col-md-6 col-xs-6"></div>
                <div class="row col-md-6 col-xs-6">
                    <ul class="list-group">
                        <li class="list-group-item">Party</li>
                    </ul>
                </div>
            </div>--}}
        </div>
    </div>


    {{-- <div class="container col-xs-12">
         <img src="/images/userprofile.png" style="width:100%;">
     </div>
     <h1> DEV </h1>
     <div class="container">
         <img src="/images/profilepic.png">
     </div>
     <div class="container-fluid">
         <div class="row">
             <div class="panel-heading">
                 Details
             </div>
             <div class="panel-body">
                 <ul class="list-group-item">
                     <li class="list-group-item">
                         <strong>First Name</strong>
                         <span class="label label-success pull-right">
                             Cheng
                         </span>
                     </li>
                     <li class="list-group-item">
                         <strong>Last Name</strong>
                         <span class="label label-success pull-right">
                             Jiang
                         </span>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="panel panel-default col-md-5 col-xs-5">
         <div class="panel-heading">
             Event Timeline
         </div>
     </div>--}}
    @endsection