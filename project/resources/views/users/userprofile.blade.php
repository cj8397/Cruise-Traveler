@extends('layouts.scrolling')

@section('content')
    <img class="img-responsive" src="/images/cruiseship.jpg">
    <div class="container">
        <div class="panel panel-default row col-md-3 col-xs-12">
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
                    {{--<li class="list-group-item"><h4>Date of Birth: </h4>{{ Auth::user()->dob }}</li>--}}
                    {{--<li class="list-group-item">{{ Auth::user()->dob }}</li>--}}
                    <li class="list-group-item"><h4>Gender: </h4>
                        @if (Auth::user()->sex === 1)
                            Male
                        @else
                            Female
                        @endif
                    </li>
                </ul>
                <input class="btn" type="submit" value="More Detail">
            </div>
            <div></div>
        </div>

        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12">
            <div class="panel-heading">
                <h2>Sailings & Events</h2>
                <div class="panel-body col-md-12 col-xs-12">
                    <a href="/sailings/list">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Join Sailing
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12">
            {{--@if(isset($usersailings))--}}
            {{--@foreach($usersailings as $sailings)--}}
            @if(isset($usersailings))
                @foreach($usersailings as $sailing)
                    {{--@for ($x = 0; $x < count($details); $x++)--}}
                    <div class="row col-md-12 col-xs-12">
                        <div class="panel-body col-md-6 col-xs-12">
                            <div class="panel-heading">
                                <label class="label-info"><h4>{!! $sailing->sailing->title !!}</h4></label>
                        </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Start Date: </strong>{!! $sailing->sailing->start_date !!}</br>
                                    <strong>Departing Port: </strong>{!! $sailing->sailing->port_org !!}</br>
                                    <strong>Destination: </strong>{!! $sailing->sailing->destination !!}</br>
                                    <strong>Sailing ID: </strong>{!! $sailing->sailing->id !!}
                                </li>
                            </ul>
                        </div>

                        <div class="panel-body col-md-6 col-xs-12">
                            <a href="{{ url('events/form/'.($sailing->sailing->id)) }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Create an Event
                                </button>
                            </a>
                        </div>

                        <div class="panel-body col-md-6 col-xs-12">
                            @foreach($userevents->where('sailing_id',$sailing->sailing->id) as $events)
                                {{--@foreach($eventdetails[$events->event_id] as $edetail)--}}
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5>Event: {!! $events->event->title !!}</h5>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Role:</strong><br>
                                        {!! $events->role !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Start:</strong><br>
                                        {!! $events->event->start_date !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>End:</strong><br>
                                        {!! $events->event->end_date !!}
                                    </li>
                                </ul>
                                {{--@endforeach--}}
                            @endforeach
                        </div>
                        {{--@endfor--}}
                    </div>
                @endforeach
            @endif
        </div>
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