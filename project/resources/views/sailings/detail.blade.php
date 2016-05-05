@extends('layouts.scrolling')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style>
        .panel-heading {
            margin-top:0;
        }

        .col-xs-4 {
            padding-left: 0;
            margin-right: 10px;
        }

        .col-xs-6, .panel .col-xs-12 {
            padding: 0px;
        }

        .col-xs-8 {
            padding-left: 10px;
            padding-right: 0;
            width: 65%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <img class="img-responsive" src="/426631.jpg" alt="">
        <div class="col-xs-12 text-center">
            <div class="col-xs-4">
                <div class="row panel panel-default">
                    <h2 class="panel-heading">{{$sailing->title}} {{$sailing->cruise_line}} </h2>
                    @if(!isset($currentUser))
                    @include('partials/buttons/joinsailing')
                    @else
                    @include('partials/buttons/leavesailing')
                    @endif
                    <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>View Events
                        </button>
                    </a>
                    <h4 class="panel-heading">Number of travellers</h4>
                    <div class="panel-body">
                        @if(!empty($stats))
                            <h4> {{$stats->total}}  </h4>
                        @else
                            <h4> 1234 </h4>
                        @endif

                        {{--<h4>@if(isset($stats)) {{ $stats->total }}@endif</h4>--}}
                    </div>
                </div>
            </div>
            <div class="col-xs-8">
                {{--<div class="row panel panel-default">--}}
                    {{--<h2 class="panel-heading" >Message Board</h2>--}}
                    {{--<div class="panel-body"><p>  Show when joined </p></div>--}}
                {{--</div>--}}
                <div class="panel panel-default">
                    <h2 class="panel-heading">Demographics</h2>
                    @if(!empty($stats) && isset($currentUser))
                    <div class="panel-body">
                        <div class="panel panel-default col-xs-12">
                            <div class="panel-heading ">
                                <h4> Languages </h4>
                            </div>
                            <div class="panel-body">
                                <div id="language"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-6">
                            <div class="panel-heading ">
                                <h4> Families </h4>
                            </div>
                            <div class="panel-body">
                                <div id="families"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-6">
                            <div class="panel-heading ">
                                <h4> Gender </h4>
                            </div>
                            <div class="panel-body">
                                <div id="sex"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12">
                            <div class="panel-heading ">
                                <h4> Ages </h4>
                            </div>
                            <div class="panel-body">
                                <div id="ages"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-6">
                            <div class="panel-heading ">
                                <h4> Countries </h4>
                            </div>
                            <div class="panel-body">
                                <div id="countries"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-6">
                            <div class="panel-heading ">
                                <h4> Cities </h4>
                            </div>
                            <div class="panel-body">
                                <div id="cities"></div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <h2> Please Join To See Demographics Of A Sailing</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(!empty($thread))
        <div class="col-xs-12">
            <div class="row panel panel-default">
              <div class="panel-heading">
                <h2>{!! $thread->subject !!}</h2>
              </div>
              <div class="panel panel-default">
                @foreach($thread->messages as $message)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->email !!}" class="img-circle">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">{!! $message->user->email !!}</h5>
                            <p>{!! $message->body !!}</p>
                            <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                        </div>
                    </div>
                @endforeach
                </div>
                <h3>Add a new message</h3>
                {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                <!-- Message Form Input -->
                <div class="form-group">
                    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Form Input -->
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            </div>
            @endif
    </div>
@endsection

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Bar({
            element: 'language',
            data: [
               @foreach( $stats->languages as $language => $percentage)
                    { y:'{{$language}}',  a:'{{$percentage}}'},
                @endforeach
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Percent']
        });

        Morris.Donut({
            element: 'countries',
            data: [
                @foreach( $stats->countries as $countries=> $percentage)
                    { label:'{{$countries}}',  value:'{{$percentage}}'},
                @endforeach
            ],
            colors: ['#FF0000', '#0000FF']
        });

        Morris.Donut({
            element: 'cities',
            data: [
                    @foreach( $stats->cities as $cities=> $percentage)
                { label:'{{$cities}}',  value:'{{$percentage}}'},
                @endforeach
            ],
            colors: ['#FF0000', '#0000FF']
        });
        Morris.Bar({
            element: 'ages',
            data: [
                @foreach( $stats->ages as $ages=> $percentage)
                    { y:'{{$ages}}',  a:'{{$percentage}}'},
                @endforeach
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Percent']
        });




        Morris.Donut({
            element: 'families',
            data: [
                {label: "Family", value: "{{$stats->family}}" },
                {label: "Non-family", value: "{{$stats->nonfamily}}" }
            ],
            colors: ['#FF0000', '#0000FF']
        });
        Morris.Donut({
            element: 'sex',
            data: [
                {label: "Male", value: "{{$stats->male}}" },
                {label: "Female", value: "{{$stats->female}}" }
            ],
            colors: ['#FF0000', '#0000FF']
        });


    </script>

@endsection
