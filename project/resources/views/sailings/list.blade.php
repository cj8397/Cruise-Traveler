@extends('layouts.thumbnail')

@section('styles')
        <style>
            h3 {
                margin-top: 10px;
            }
            .col-md-3 {
                padding: 0 5px;
            }
            .panel .col-md-6 {
                padding: 0 5px;
            }
            .panel .col-md-6 > a {
                width: 100%;
            }
            .stats .col-md-5 {
                padding-left: 0;
            }
            .panel .col-xs-12 {
                padding: 5px 0;
            }
            hr {
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .stats > .col-md-5 {
                padding-right: 20px;
                box-sizing: content-box;
            }

            .panel-body .panel-body {
                padding-top: 0;
            }

            .panel-body .panel-body > h4 {
                text-decoration: underline;
                margin-bottom: 0;
            }

            .panel .panel {
                margin-bottom: 10px;
            }
            ul {
                margin-left: 10px;
            }
        </style>
@endsection

@section('content')

<div class="container">
    <div class="col-xs-12">
        <form url="sailings/" class="form navbar-form navbar-right searchform">
            <input type="text" value="{!! $request->search !!}" name="search" class="form-control" placeholder="Search">
            @if(!empty($destinations))
                <select name="destination" id="destination" class="form-control">
                    <option value="">Destination</option>
                    @foreach($destinations as $dest)
                        <option @if($request->destination == $dest->destination)
                                selected
                                @endif
                                value="{{$dest->destination}}">{{$dest->destination}}</option>
                    @endforeach
                </select>
            @endif

            @if(!empty($ports))
                <select name="origin" id="origin" class="form-control">
                    <option value="">Port of Origin</option>
                    @foreach($ports as $port)
                        <option  @if($request->origin == $port->port_org)
                                 selected
                                 @endif
                                value="{{$port->port_org}}">{{$port->port_org}}</option>
                    @endforeach
                </select>
            @endif
            <select name="sort" id="sort" class="form-control">
                <option value="">Sort</option>
                <option @if($request->sort == 'asc')
                        selected
                        @endif
                        value="asc">Date: Future to past</option>
                <option @if($request->sort == 'desc')
                        selected
                        @endif
                        value="desc">Date: Past to future</option>
            </select>
            <input type="submit" value="Submit" class="btn btn-default">
        </form>
    </div>
    <hr class="style-eight">
    @if($sailings->count() < 1 )
        <div>
            <div class="jumbotron"> <h1>No Results Were Found</h1></div>
        </div>
    @endif
<div class="col-xs-12">
    @foreach ($sailings as $sailing)
        <div class=" col-sm-6 col-md-4">
        <div class="panel panel-default tile">
            <div class="panel-heading">
                <a href="{{ action('SailingsController@GetSailing', [$sailing->id]) }}">
                    <h3> {{$sailing->cruise_line}}</h3>
                </a>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if( $sailing->destination == "Alaska")
                            <img class="img-responsive" src="/images/alaskan_thumb.png" alt="">
                        @elseif( $sailing->destination == "Caribbean")
                            <img class="img-responsive" src="/images/caribbean_thumb.png" alt="">
                        @else
                            <img class="img-responsive" src="/images/mediterranean_thumb.png" alt="">
                        @endif
                    </div>
                    <div class="panel-body">
                        <h4> {{$sailing->destination}} </h4>
                        <div class="col-xs-12"> <b>Port of Origin:</b> {{$sailing->port_org}}</div>
                        <div class="col-xs-12"> <b>Departs:</b> {{$sailing->start_date }} </div>
                        <div class="col-xs-12"> <b>Returns:</b> {{ $sailing->end_date }}</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4> Demographics </h4>
                        @if(!empty($sailing['stats']))
                            @if($sailing['stats']->total != null)
                                <div class="stats clearfix">
                                    <div class="col-md-5 col-xs-12">
                                        <div>
                                            <p><b>Confirmed:</b> {{$sailing['stats']->total}}  </p>
                                        </div>
                                        <div>
                                            <b> Languages: </b>
                                            <ul>
                                                @foreach($sailing['stats']->languages as $language => $value)
                                                    <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12 cities">
                                        <div>
                                            <p><b>Families:</b> {{ $sailing['stats']->family }}%</p>
                                        </div>
                                        <div>
                                            <b> Cities: </b>
                                            <ul>
                                                @foreach($sailing['stats']->cities as $city => $value)
                                                    <li> <span><b>{{ $city }}: </b> {{ $value }}% </span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="">
                                    <h4> No confirmed passengers</h4>
                                </div>
                            @endif
                        @else
                            <div class="panel panel-default col-md-12 col-xs-12 text-center">
                                <div class="panel-body col-md-6 col-xs-12">
                                    <p>56% Passenger over 50yrs/old</p>
                                </div>
                                <div class="panel-body col-md-6 col-xs-12">
                                    <p>65% Passengers are single</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12">
                    <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}" class="btn btn-primary btn-md">View Events </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12 col-md-12 col-xs-12">
      {{$sailings->appends(['search' => $request->search,
                'destination' => $request->destination,
                'origin' => $request->origin,
                'sort' => $request->sort ])
                ->links()}}
    </div>
</div>
@endsection
