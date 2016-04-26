@extends('layouts.scrolling')

@section('content')
    <img class="img-responsive" src="/426631.jpg" alt="">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xs-12">
        <div class="panel panel-default col-md-12 col-xs-12">
            <div class="panel panel-heading">{!! $event->title !!}</div>
            <div class="panel panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                       <strong>Start Time!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->start_date !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>End Time!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->end_date !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Location!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->location !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Description!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->desc !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('events/update/'.$event->id) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Update Event
                            </button>
                        </a>
                        <a href="{{ url('events/delete/'.$event->id) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Delete Event
                            </button>
                        </a>
                        @include('partials.buttons.joinevent')
                        @include('partials.buttons.leaveevent')
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default col-md-12 col-xs-12">
            <div class="panel panel-heading">Message Boards!</div>
            <div class=" panel panel-body">
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
    </div>
    <div class="row col-md-5 col-md-offset-1 col-xs-12">
        <div class="panel panel-default col-md-12 col-xs-12">
            <div class="panel panel-heading">Participants</div>
            <div class="panel panel-body">
                <div class="row">
                    @foreach ($members as $mem)
                    <a class="col-xs-6 col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <span class="label label-default label-pill">{!! $mem->user_id !!}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        </div>
@endsection
