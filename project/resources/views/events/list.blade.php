@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">
<div class="row">
    <form name="searchEvents" url="search/{!! $sailing->id!!}" class="form navbar-form navbar-right searchform">
        <input type="text" value="{!! $old->search !!}" name="search" class="form-control"
               placeholder="Search by Event title or Event description.....">
        <select name="sort" class="form-control" >
            <option @if($old->sort == 'start_date')
                    selected
                    @endif
                    value="start_date">End Date
            </option>
            <option @if($old->sort == 'end_date')
                    selected
                    @endif
                    value="end_date">Start Date
            </option>
        </select>
        <select name="direction" class="form-control">
            <option @if($old->sort == 'asc')
                    selected
                    @endif

                    value="asc">Date: Future to past
            </option>
            <option @if($old->sort == 'desc')
                    selected
                    @endif

                    value="desc">Date: Past to future
            </option>
        </select>
        <input type="submit" value="Search" class="btn btn-default">
    </form>
</div>
    <!-- Page Heading -->
    <div class="container-fluid text-center panel panel-primary">
        <div class="row col-sm-4 col-xs-12">
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
                            <div class="col-xs-12"><b>Port of Origin:</b> {{$sailing->port_org}}</div>
                            <div class="col-xs-12"><b>Departs:</b> {{$sailing->start_date }} </div>
                            <div class="col-xs-12"><b>Returns:</b> {{ $sailing->end_date }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-sm-7 col-sm-offset-1 col-xs-12" style="overflow-y: scroll; height:500px">
            @foreach($events->chunk(2) as $row)
                <div class="row ">
                    @foreach($row as $event)
                        <div class="panel panel-default col-sm-6 col-xs-12 portfolio-item">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h4> {!! ucfirst($event->title) !!}</h4>
                                </li>
                                <li class="list-group-item alert alert-info">
                                    <p>{!! $event->start_date !!}</p>
                                </li>
                                <li class="list-group-item">
                                    <a href="/events/detail/{!! $event->id !!}">
                                        <button type="button" class="btn btn-primary btn-md">
                                            <i class="fa fa-users" aria-hidden="true"></i>Event Detail
                                        </button>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    {{$events->appends(['search' => $old->search,
                    'sort' => $old->sort,
                    'direction' => $old->direction])
                    ->links()}}
                </div>
            </div>
    </div>
</div>
@endsection
