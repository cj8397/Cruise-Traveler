@extends('layouts.thumbnail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h2>
                <a href="{{ action('SailingsController@GetSailing', [$sailing->id]) }}">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="" width="500" height="700">
                <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="" width="500" height="700">
                </a>
                <a href="/joinsailing/{{$sailing->id}}">
                    <button type="button" class="btn btn-primary btn-md">
                        <i class="fa fa-plus" aria-hidden="true"></i>Join
                    </button>
                </a>
                <a href="/leavesailing/{{$sailing->id}}">
                    <button type="button" class="btn btn-primary btn-md">
                        <i class="fa fa-minus" aria-hidden="true"></i>Leave
                    </button>
                </a>
            </div>
        </div>
@endsection
