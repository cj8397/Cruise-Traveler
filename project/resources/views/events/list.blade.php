@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">
<div class="row">
    <form url="events/{!! $sailing_id !!}" class="form navbar-form navbar-right searchform">
        <input type="text" name="search" class="form-control" placeholder="Search by Event title or Event description.....">
        <select name="sort" class="form-control" >
            <option value="title">Title</option>
            <option value="start_date">End Date</option>
            <option value="end_date">Start Date</option>
            <option value="desc">Description</option>
            <option value="location">Location</option>
        </select>
        <select name="direction" class="form-control">
            <option value="desc">Descending</option>
            <option value="asc">Ascending</option>
        </select>
        <input type="submit" value="Search" class="btn btn-default">
    </form>
</div>
    <!-- Page Heading -->
    <div class="row col-md-12 col-xs-12">
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
    @if($events->count()<1 )
        <div class="row">
            <div class="jumbotron"> <h1>No Results Were Found</h1></div>
        </div>
    @endif
    <div class="row">
        @foreach($events as $event)
            @if($event->userevent->count() > 0)
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
                    <?php
                        $total = $event->userevent->count();
                    $singles = ($event->userevent->where('family',0)->count()/$total)*100;
                    $families = ($event->userevent->where('family',1)->count()/$total)*100;
                    $males =($event->userevent->where('sex',1)->count()/$total)*100;
                    $females =($event->userevent->where('sex',0)->count()/$total)*100;
                    ?>
                    <li class="list-group-item">
                        <p>{!! $total !!} People currently attending</p>
                        </li>
                        <li class="list-group-item">
                        <p>{!! $singles."% Singles  ".$families."  % Families" !!}</p>
                            </li>
                    <li class="list-group-item">
                        <p>{!! $males."% Males ".$females."% Females"!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p>{!! 'languages' !!}</p>
                    </li>
                    </ul>
            </div>
            @endif
            @endforeach
                    <!-- /.row -->


            <hr>
            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    {{$events->links()}}
                </div>
            </div>
    </div>
</div>
@endsection