@extends('layouts.scrolling')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style>
        .panel-heading {
<<<<<<< HEAD
            margin-top:0;
=======
            margin-top: 0;
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
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
                    @include('partials/buttons/joinsailing')
                    @include('partials/buttons/leavesailing')
                    <a href="{{ action('EventsController@GetAllEvents', [$sailing->id]) }}">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>View Events
                        </button>
                    </a>
                    <h4 class="panel-heading">Number of travellers</h4>
                    <div class="panel-body">
                        <h4>3,409</h4>
                    </div>
                    <h4 class="panel-heading">Number of Male</h4>
                    <div class="panel-body">
                        <h4>2,000</h4>
                    </div>
                    <div class="panel-heading">
                        <h4>Number of Female</h4>
                    </div>
                    <div class="panel-body">
                        <h4>1,409</h4>
                    </div>
                    <h4 class="panel-heading">Number of travellers with children between 1-10</h4>
                    <div class="panel-body">
                        <h4>279</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-8">
                {{--<div class="row panel panel-default">--}}
<<<<<<< HEAD
                    {{--<h2 class="panel-heading" >Message Board</h2>--}}
                    {{--<div class="panel-body"><p>  Show when joined </p></div>--}}
                {{--</div>--}}
                <div class="panel panel-default">
                    <h2 class="panel-heading">Demographics</h2>
                    @if(!empty($stats))
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
                    </div>
=======
                {{--<h2 class="panel-heading" >Message Board</h2>--}}
                {{--<div class="panel-body"><p>  Show when joined </p></div>--}}
                {{--</div>--}}
                <div class="panel panel-default">
                    <h2 class="panel-heading">Demographics</h2>
                    @if(isset($stats))
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
                        </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                    @endif
                </div>
            </div>
        </div>
<<<<<<< HEAD
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
=======
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
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
<<<<<<< HEAD
               @foreach( $stats->languages as $language => $percentage)
                    { y:'{{$language}}',  a:'{{$percentage}}'},
=======
                    @foreach( $stats->languages as $language => $percentage)
                {
                    y: '{{$language}}', a: '{{$percentage}}'
                },
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                @endforeach
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Percent']
        });

        Morris.Donut({
            element: 'families',
            data: [
<<<<<<< HEAD
                {label: "Family", value: "{{$stats->family}}" },
                {label: "Non-family", value: "{{$stats->nonfamily}}" }
=======
                {label: "Family", value: "{{$stats->family}}"},
                {label: "Non-family", value: "{{$stats->nonfamily}}"}
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
            ],
            colors: ['#FF0000', '#0000FF']
        });
        Morris.Donut({
            element: 'sex',
            data: [
<<<<<<< HEAD
                {label: "Male", value: "{{$stats->male}}" },
                {label: "Female", value: "{{$stats->female}}" }
=======
                {label: "Male", value: "{{$stats->male}}"},
                {label: "Female", value: "{{$stats->female}}"}
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
            ],
            colors: ['#FF0000', '#0000FF']
        });


    </script>

@endsection




