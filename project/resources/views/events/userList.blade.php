@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    @foreach($userSailing as $userSail)
    <div class="row col-md-12 col-xs-12">
        <div class="col-lg-12">
            <h1 class="page-header">All the events
                <small>Events on Cruise Ship {!! $userSail->sailing->cruise_line!!}</small>
                <a href="{{ url('events/form/'.$userSail->sailing->id) }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Create an Event
                    </button>
                </a>
            </h1>
        </div>
    </div>
        @foreach($userSail->event as $event)
            <div class="panel panel-default col-md-3 portfolio-item">
                <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                <ul class="list-group">
                    <li  class="list-group-item">
                        <h4> {!! ucfirst($event->title) !!}</h4>
                    </li>
                    <li class="list-group-item">
                        <a href="/events/detail/{!! $event->id !!}">
                            <button type="button" class="btn btn-primary btn-md">
                                <i class="fa fa-users" aria-hidden="true"></i>Event Detail
                            </button>
                        </a>

                    </li>
                    <li class="list-group-item alert alert-info">
                        <p>{!! $event->start_date !!}</p>
                    </li>
                    <li class="list-group-item alert alert-info">
                        <p>{!! $event->end_date !!}</p>
                    </li>
                    <li class="list-group-item alert alert-info">
                        <p>{!! $event->desc !!}</p>
                    </li>
                    <li class="list-group-item alert alert-info">
                        {!! $event->location !!}
                    </li>
                </ul>
            </div>
        @endforeach
    @endforeach
</div>
@endsection