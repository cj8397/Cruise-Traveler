@extends('layouts.scrolling')

@section('content')
    <div class="container">
        <img class="img-responsive" src="/426631.jpg" alt="">
        <div class="row col-md-12 col-xs-12 text-center">
            <div class="col-xs-4">
                <div class="row panel panel-default">
                    <h2 class="panel-heading" style="margin-top: 0;">{{$sailing->title}} {{$sailing->cruise_line}} </h2>
                    @include('partials/buttons/joinsailing')
                    @include('partials/buttons/leavesailing')
                    <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>View Events
                        </button>
                    </a>
                    <h4 class="panel-heading">Number of travellers</h4>
                    <div class="panel-body">
                        <h4>3,409</h4>
                    </div>
                    <h4 class="panel-heading">Number of Male</h4>
                    <div class="panel-body">
                        <h4>2,000</h4>
                    </div>
                    <div class="panel-heading">
                        <h4>Number of Female</h4>
                    </div>
                    <div class="panel-body">
                        <h4>1,409</h4>
                    </div>
                    <h4 class="panel-heading">Number of travellers with children between 1-10</h4>
                    <div class="panel-body">
                        <h4>279</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="row panel panel-default">
                    <h2 class="panel-heading" style="margin-top: 0;">Message Board</h2>
                    <div class="panel-body"><p>  Show when joined </p></div>
                </div>
                <div class="row panel panel-default">
                    <h2 class="panel-heading" style="margin-top: 0;">Stats</h2>
                    <div class="panel-body"><p>  Show when not joined </p></div>
                </div>
            </div>
        </div>
    </div>
@endsection




