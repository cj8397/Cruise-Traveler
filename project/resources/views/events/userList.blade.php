@extends('layouts.thumbnail')
@section('styles')
    <style>
        .tile .panel {
            text-align: left;
        }

        .panel .col-xs-12 {
            padding: 5px 0;
        }

        .events-container {
            overflow-y: scroll;
            height: 80vh;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 40px;
            padding: 10px;
        }

        .sailing  {
            height: 80vh;
        }

        .events-container p {
            text-align: left;
        }

        .events-container p > b {
            display: inline-block;
            width: 50px;
        }
        h4.panel-heading {
            margin-top: 0;
        }

        footer {
            margin: 0;
        }

        .panel.col-sm-6, .panel.col-xs-12 {
            padding: 0;
        }

        .panel-body > a {
            width: 100%;
        }

    </style>
@endsection
@section('content')
    @foreach($userSailing as $userSail)
        <div class="text-center">
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default tile sailing">
                    <div class="panel-heading">
                        <a href="{{ action('SailingsController@GetSailing', [$userSail->sailing->id]) }}">
                            <h3> {{$userSail->sailing->cruise_line}}</h3>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @if( $userSail->sailing->destination == "Alaska")
                                    <img class="img-responsive" src="/images/alaskan_thumb.png" alt="">
                                @elseif( $userSail->sailing->destination == "Caribbean")
                                    <img class="img-responsive" src="/images/caribbean_thumb.png" alt="">
                                @else
                                    <img class="img-responsive" src="/images/mediterranean_thumb.png" alt="">
                                @endif
                            </div>
                            <div class="panel-body">
                                <h4> {{$userSail->sailing->destination}} </h4>
                                <div class="col-xs-12"><b>Port of Origin:</b> {{$userSail->sailing->port_org}}</div>
                                <div class="col-xs-12"><b>Departs:</b> {{$userSail->sailing->start_date }}</div>
                                <div class="col-xs-12"><b>Returns:</b> {{ $userSail->sailing->end_date }}</div>
                                <?php $sailing = $userSail->sailing ?>
                                <div class="col-xs-12">
                                    @include('partials.buttons.createevent')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-xs-12 events-container" style="">
                @foreach($userSail->event->chunk(2) as $row)
                    @foreach($row as $event)
                        <div class="col-sm-6 col-xs-12">
                            <div class="panel panel-default ">
                                <h4 class="panel-heading"> {!! ucfirst($event->title) !!}</h4>
                                <div class="panel-body">
                                    <p> <b>Starts:</b> {!! $event->start_date !!}</p>
                                    <p> <b>Ends:</b> {!! $event->end_date !!}</p>
                                    <a href="/events/detail/{!! $event->id !!}" class="btn btn-primary btn-md">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-xs-12">
            {{$userSailing->links()}}
        </div>
    </div>
@endsection