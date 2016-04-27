@extends('layouts.thumbnail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h2>
                <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="">
                </a>
                @include('partials/buttons/joinsailing')
                @include('partials/buttons/leavesailing')
            </div>
        </div>
@endsection
