@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Events Page
                <small>Events on Cruise Ship {!! $sailing_id !!}</small>
                <a href="{{ url('events/form/'.$sailing_id) }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Create an Event
                    </button>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->


    <!-- Projects Row -->
    <div class="row">
        @foreach($events as $event)
        <div class="col-xs-6 col-sm-3 portfolio-item">
            <a href="/events/detail/{!! $event->id !!}">
                <img class="img-responsive" src="/images/eventInfo.png" alt="">
            </a>
            <h4> {!! ucfirst($event->title) !!}</h4>
            <p>200 going 80% male 20% male </p>
        </div>
            @endforeach
    <!-- /.row -->


    <hr>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <ul class="pagination">
                <li>
                    <a href="/eventdetail/1">&laquo;</a>
                </li>
                <li class="active">
                    <a href="/eventdetail/1">1</a>
                </li>
                <li>
                    <a href="/eventdetail/1">2</a>
                </li>
                <li>
                    <a href="/eventdetail/1">3</a>
                </li>
                <li>
                    <a href="/eventdetail/1">4</a>
                </li>
                <li>
                    <a href="/eventdetail/1">5</a>
                </li>
                <li>
                    <a href="/eventdetail/1">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
            </div>
    </div>
@endsection