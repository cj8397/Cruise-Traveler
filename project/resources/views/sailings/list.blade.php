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
            <div class="panel panel-default col-md-3 col-sm-4 col-xs-12 text-center">
                <h4>{{$sailing->cruise_line}}</h4>
                <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                <div class="col-md-6 col-xs-6">
                    <a href="{{ action('SailingsController@GetSailing', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Sailing Stats
                        </button>
                    </a>
                </div>
                <div class="col-md-5 col-md-offset-1 col-xs-6">
                    <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Sailing Events
                        </button>
                    </a>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Companion</h5></li>
                            <li class="list-group-item">With family (40%)</li>
                            <li class="list-group-item">Traveling alone (60%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">China</li>
                            <li class="list-group-item">Russia</li>
                            <li class="list-group-item">Australia</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">Chinese</li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">Spanish</li>
                        </ul>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

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
