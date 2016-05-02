@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">
    <div class="container">
    <!-- Page Heading -->
    <div class="row">
        <img class="img-responsive" src="/images/searchBar.png" alt="">
        <div class="col-lg-12">
            <h1 class="page-header">All Sailings
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->

    <div class="row">
        @foreach ($sailings as $sailing)
            <div class="panel panel-default col-md-3 portfolio-item">
                <h2>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h2>
                <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                <div class="col-md-6 col-xs-6">
                    <a href="{{ action('SailingsController@GetSailing', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Sailing Stats
                        </button>
                    </a>
                </div>
                <div class="col-md-6 col-xs-6">
                    <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Sailing Events
                        </button>
                    </a>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel-body col-md-6 col-xs-12">
                        <p>56% Passenger over 50yrs/old</p>
                    </div>
                    <div class="panel-body col-md-6 col-xs-12">
                        <p>65% Passengers are single</p>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
    <hr>
{!! $users->render() !!}
    <hr>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="/events/1">&laquo;</a>
                </li>
                <li class="active">
                    <a href="/events/1">1</a>
                </li>
                <li>
                    <a href="/events/1">2</a>
                </li>
                <li>
                    <a href="/events/1">3</a>
                </li>
                <li>
                    <a href="/events/1">4</a>
                </li>
                <li>
                    <a href="/events/1">5</a>
                </li>
                <li>
                    <a href="/events/1">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
