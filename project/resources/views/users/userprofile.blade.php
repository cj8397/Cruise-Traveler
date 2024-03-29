@extends('layouts.scrolling')
@section('styles')
    <style>
        #events {
            height: 300px;
            overflow-y: auto;
        }

        #credits {
            margin-top: 5%;
        }
    </style>
@endsection
@section('scripts')
    <script>
        @if(isset($userdetail->dob))
            $(function () {

            $('.toggle').click(function (event) {
                event.preventDefault();
                var target = $(this).attr('href');
                $(target).toggleClass('hidden show');
            });
        });
        </script>
        @endif
        @endsection
        @section('content')


    <img class="img-responsive" src="/images/cruiseship.jpg">
    <div class="container">
        <div class="panel panel-default row col-md-3 col-xs-12">
            <div class="panel-body col-md-12 col-xs-12">
                <img class="img-responsive img-circle" src="/images/profilepic.png" width="200" height="200">
            </div>
            <div class="col-md-12 col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item"><h4>Email: </h4>{{ Auth::user()->email }}</li>
                    <li class="list-group-item"><h4>First Name: </h4>{{ $userdetail->first }}</li>
                    <li class="list-group-item"><h4>Last Name: </h4>{{ $userdetail->last }}</li>
                    <li class="list-group-item"><h4>Gender: </h4>
                        @if ($userdetail->sex === 1)
                            Male
                        @else
                            Female
                        @endif
                    </li>
                </ul>

                <div id="credits" class="well hidden col-md-12 col-xs-12">

                    <ul class="list-group">
                        <li class="list-group-item"><h4>Date of Birth: </h4>{{ $userdetail->dob }}</li>
                        <li class="list-group-item"><h4>City: </h4>{{ $userdetail->city }}</li>
                        <li class="list-group-item"><h4>Region: </h4>{{ $userdetail->region }}</li>
                        <li class="list-group-item"><h4>Country: </h4>{{ $userdetail->country }}</li>
                        <li class="list-group-item"><h4>Language: </h4>{{ $userdetail->lang }}</li>
                    </ul>
                </div>
                <a href="@if(isset($userdetail->dob))#credits @else{{url('users/detail')}}@endif"
                   class="toggle btn btn-primary">More Details</a>
            </div>
        </div>

        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12 text-center">
            <div class="panel-heading">
                <h2>Sailings & Events</h2>
                <div class="panel-body col-md-12 col-xs-12">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Join Sailings
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12">
            <div class="row panel panel-heading text-center">
                <h2>History</h2>
            </div>
            @foreach($usersailings as $sailing)
                <div class="panel panel-default col-md-4 col-sm-6 col-xs-12 text-center">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label><a href="{{ action('SailingsController@GetSailing', [$sailing->sailing_id]) }}"
                                      class=""><h4>
                                        {!! $sailing->sailing->cruise_line !!}
                                    </h4></a></label>
                            <p>{!! $sailing->sailing->destination !!}</p>
                        </li>
                        <li class="list-group-item">
                            <p>{!! $sailing->sailing->start_date !!}</p>
                        </li>
                    </ul>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#yourModal{!! $sailing->sailing_id !!}">
                        Events
                    </button>
                </div>


                <div class="modal fade" id="yourModal{{$sailing->sailing_id}}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @foreach($userevents->where('sailing_id', $sailing->sailing_id) as $events)

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel"><a
                                                href="/events/detail/{!! $events->event->id !!}">{!! $events->event->title !!}</a>

                                    </h4>

                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5><strong>Start Time: </strong>{!! $events->event->start_date !!}</h5>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Location: </strong>{!! $events->event->location !!}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Role:</strong><br>
                                            @if ($events->role == "Host")
                                                <span class="label label-pill label-warning">{!! $events->role !!}</span>
                                            @else
                                                <span class="label label-pill label-danger">{!! $events->role !!}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                {{--     <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                     </div>--}}
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            {{--<a href="{{ url('events/form/'.($sailing->sailing->id)) }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Create an Event
                </button>
            </a>--}}


        </div>
        <!-- Pagination -->
        {{--<div class="row text-center">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <ul class="pagination">
                    <li>
                        <a href="../users/userprofile.blade.php/">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="../users/userprofile.blade.php/">1</a>
                    </li>
                    <li>
                        <a href="../users/userprofile.blade.php/">2</a>
                    </li>
                    <li>
                        <a href="../users/userprofile.blade.php/">3</a>
                    </li>
                    <li>
                        <a href="../users/userprofile.blade.php/">&raquo;</a>
                </ul>
            </div>
        </div>--}}

        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-xs-12">
                {{$usersailings->links()}}
            </div>
        </div>
    </div>
@endsection
