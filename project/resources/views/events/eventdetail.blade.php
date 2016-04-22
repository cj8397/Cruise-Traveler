@extends('layouts.scrolling')

@section('content')
    <img class="img-responsive" src="/426631.jpg" alt="">
    <div class="container-fluid">
        <div class="row col-md-6 col-xs-12">
            <div class="panel panel-default col-md-12 col-xs-12">
                <div class="panel-heading">{!! $event->title !!}</div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Start Time!</strong>
                        <p class="label label-info center-block">
                            {!! $event->start_date !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>End Time!</strong>
                        <p class="label label-info center-block">
                            {!! $event->end_date !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Location!</strong>
                        <p class="label label-info center-block">
                            {!! $event->location !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Description!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->desc !!}
                        </p>
                    </li>
                </ul>
            </div>
        </div>
            <div class="panel panel-default col-md-12 col-xs-12">
                <div class="panel-heading">Message Boards!</div>
            <div class="panel-body">
                <div class="row">
                    <a class="col-xs-3 col-md-3">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                    <p class="alert alert-info col-xs-9 col-md-9">Cheng just Joined the Event! say HI!</p>
                </div>
                <div class="row">
                    <p class="alert alert-success col-xs-9 col-md-9">Lets get the party started!</p>
                    <a class="col-xs-3 col-md-3">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>

                    </a>
                </div>
            </div>
            </div>
        </div>
        <div class="row col-md-5 col-md-offset-1 col-xs-12">
            <div class="panel panel-default col-md-12 col-xs-12">
                <div class="panel-heading">Participants</div>
                <div class="panel-body">
                    <div class="row">
                    <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                    <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                    <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                    <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                        <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                        <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">Cheng!</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
