@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
        <div class="row">
<div class="container">
    <form url="sailings/" class="form navbar-form navbar-right searchform">
        <input type="text" name="search" class="form-control" placeholder="Search by cruise line and name!">
        <select name="sort" class="form-control" >
            <option value="title">Title</option>
            <option value="cruise_line">Cruise Line</option>
            <option value="start_date">End Date</option>
            <option value="end_date">Start Date</option>
            <option value="port_org">Original Port</option>
            <option value="port_dest">Destination Port</option>
            <option value="destination">Destination</option>
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
    <div class="row">
        @foreach ($sailings as $sailing)
            <div class="panel panel-default col-md-3 portfolio-item">
                <h2> {{$sailing->cruise_line}} {{$sailing->title}}</h2>
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
                @if(!empty($sailing['stats']))
                    <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                        <div class="panel-body col-md-6 col-xs-12">
                            <p>Confirmed Passengers: {{$sailing['stats']->total}}  </p>
                        </div>
                        <div class="panel-body col-md-6 col-xs-12">
                            <p> Percent Families: {{ $sailing['stats']->family }} %</p>
                        </div>
                        <div class="panel-body col-xs-12">
                            <h4> Languages: </h4>
                            <ul>
                                @foreach($sailing['stats']->languages as $language => $value)
                                    <li> <b>{{ $language }} </b> - {{ $value }} % </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-body col-xs-12">
                            <h4> Cities: </h4>
                            <ul>
                                @foreach($sailing['stats']->cities as $city => $value)
                                    <li> <b>{{ $city }} </b> - {{ $value }} % </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                        <div class="panel-body col-md-6 col-xs-12">
                            <p>No stats found for this sailing</p>
                        </div>
                        <div class="panel-body col-md-6 col-xs-12">
                            <p>No stats found for this sailing</p>
                        </div>
                    </div>
                @endif

            </div>

        @endforeach
    </div>

    <hr>
    <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-xs-12">
                {{$sailings->links()}}
            </div>
        </div>
@endsection
