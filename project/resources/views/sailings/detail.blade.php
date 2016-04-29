@extends('layouts.thumbnail')

@section('content')
    <div class="container">
        <div class="row col-md-12 col-xs-12 text-center">
            <div class="col-md-6 col-md-offset-3">
                <h2>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h2>

                @include('partials/buttons/joinsailing')
                @include('partials/buttons/leavesailing')

            </div>
            <div class="col-xs-12 col-md-12"><p></p></div>

            <div class="row panel panel-default col-md-4 col-sm-4 col-xs-12">
                <div class="panel-heading">
                    <h4>Number of travellers</h4>
                </div>
                <div class="panel-body col-xs-12 col-md-12">
                    <h4>3,409</h4>
                </div>
            </div>

            <div class="row panel panel-default col-md-4 col-sm-4 col-xs-12">
                <div class="panel-heading">
                    <h4>Number of Male</h4>
                </div>
                <div class="panel-body col-xs-12 col-md-12">
                    <h4>2,000</h4>
                </div>
            </div>

            <div class="row panel panel-default col-md-4 col-sm-4 col-xs-12">
                <div class="panel-heading">
                    <h4>Number of Female</h4>
                </div>
                <div class="panel-body col-xs-12 col-md-12">
                    <h4>1,409</h4>
                </div>
            </div>

            <div class="row panel panel-default col-md-4 col-sm-4 col-xs-12">
                <div class="panel-heading">
                    <h4>Number of travellers with children between 1-10</h4>
                </div>
                <div class="panel-body col-xs-12 col-md-12">
                    <h4>279</h4>
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                    <button type="button" class="btn btn-primary btn-md">
                        <i class="fa fa-users" aria-hidden="true"></i>Sailing Events
                    </button>
                </a>
            </div>

        </div>
    </div>
@endsection
