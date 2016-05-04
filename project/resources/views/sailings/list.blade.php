@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">
    <div class="row text-center">
        <form url="/sailings/" class="form navbar-form navbar-right searchform">
        <input type="text" name="search" class="form-control" placeholder="Look for your cruise by name.....">
        <select name="sort" class="form-control" >
            <option value="title">Title</option>
            <option value="cruise_line">Cruise Line</option>
            <option value="destination">Destination</option>
            <option value="start_date">End Date</option>
            <option value="end_date">Start Date</option>
            <option value="port_org">Original Port</option>
            <option value="port_dest">Destination Port</option>
        </select>
        <select name="direction" class="form-control">
            <option value="desc">Descending</option>
            <option value="asc">Ascending</option>
        </select>
        <input type="submit" value="Search" class="btn btn-default">
        </form>
    </div>
    <div class="container">
    <!-- Page Heading -->
    <!-- /.row -->

    <!-- Projects Row -->
        @if($sailings->count()<1 )
    <div class="row">
        <div class="jumbotron"> <h1>No Results Were Found</h1></div>
    </div>
        @endif
    <div class="row col-md-12 col-xs-12">
        @foreach ($sailings as $sailing)
            <div class="panel panel-default col-md-3 portfolio-item">
                <h4>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h4>
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
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            {{$sailings->links()}}
        </div>
    </div>
@endsection
