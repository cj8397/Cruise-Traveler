@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
        <div class="row">
<div class="container">
    <div class="col-xs-12">
        <form url="sailings/" class="form navbar-form navbar-right searchform">
            <input type="text" name="search" class="form-control" placeholder="Search">
            @if(!empty($destinations))
                <select name="destination" id="destination" class="form-control">
                    <option value="">Destination</option>
                    @foreach($destinations as $dest)
                        <option value="{{$dest->destination}}">{{$dest->destination}}</option>
                    @endforeach
                </select>
            @endif

            @if(!empty($ports))
                <select name="origin" id="origin" class="form-control">
                    <option value="">Port of Origin</option>
                    @foreach($ports as $port)
                        <option value="{{$port->port_org}}">{{$port->port_org}}</option>
                    @endforeach
                </select>
            @endif
            <select name="sort" id="sort" class="form-control">
                <option value="">Sort</option>
                <option value="asc">Date: Future to past</option>
                <option value="desc">Date: Past to future</option>
            </select>
            <input type="submit" value="Submit" class="btn btn-default">
        </form>
    </div>
</div>
    <div class="container">
    <!-- Page Heading -->
    <!-- /.row -->

    <!-- Projects Row -->

        @if($sailings->count() < 1 )
            <div class="row">
                <div class="jumbotron"> <h1>No Results Were Found</h1></div>
            </div>
        @endif
    <div class="row">
        @foreach ($sailings as $sailing)
            <div class="panel panel-default col-md-3 portfolio-item">
                <h3> {{$sailing->cruise_line}} {{$sailing->title}}</h3>
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
                    @if($sailing['stats']->total != null)
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
                            <h4> No users in sailing </h4>
                        </div>
                    @endif
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
