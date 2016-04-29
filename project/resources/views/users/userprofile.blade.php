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
                        <hr>
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
                                {{--@if($events != null)--}}
                                    {{--@foreach($eventdetails[$events->event_id] as $edetail)--}}
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5>Event: <a
                                                        href="/events/detail/{!! $events->event->id !!}">{!! $events->event->title !!}</a>
                                            </h5>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Role:</strong><br>
                                            @if ($events->role == "host")
                                                <span class="label label-pill label-warning">{!! $events->role !!}</span>
                                            @else
                                                <span class="label label-pill label-danger">{!! $events->role !!}</span>
                                            @endif
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
                                {{--@else--}}
                                {{--<span class="label label-pill label-default">You are not participating in any events for this sailing... =(</span>--}}
                                {{--@endif--}}
                            @endforeach

                        </div>
                        {{--@endfor--}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection