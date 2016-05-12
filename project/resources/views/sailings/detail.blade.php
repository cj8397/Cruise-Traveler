@extends('layouts.scrolling')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{ URL::asset('styles/custom/sailing-detail.css') }}" />
    <style>
        .panel .col-xs-12 {
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="img-wrapper">
        <img class="img-responsive" src="/426631.jpg" alt="">
    </div>
    <div class="col-xs-12 col-md-12 col-lg-12 text-center">
        <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="row panel panel-default">
                <h2 class="panel-heading">{{$sailing->title}} {{$sailing->cruise_line}} </h2>
                <div class="panel-body">
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
                </div>
                <h4 class="panel-heading">Number of travellers</h4>
                <div class="panel-body">
                    @if(!empty($stats))
                        <h4> {{$stats->total}}  </h4>
                    @else
                        <h4> 1234 </h4>
                    @endif
                </div>
            </div>
        </div>
        @if(!isset($currentUser))
        <div class="col-xs-12 col-md-8 col-lg-8">
            <div class="panel panel-default">
                <h2 class="panel-heading">Demographics</h2>
                @if(!empty($stats))
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4> Languages </h4>
                            </div>
                            <div class="panel-body">
                                <div id="language"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-12">
                            <div class="panel-heading ">
                                <h4> Families </h4>
                            </div>
                            <div class="panel-body">
                                <div id="families"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-12">
                            <div class="panel-heading ">
                                <h4> Gender </h4>
                            </div>
                            <div class="panel-body">
                                <div id="sex"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-12">
                            <div class="panel-heading">
                                <h4> Ages </h4>
                            </div>
                            <div class="panel-body">
                                <div id="ages"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-12">
                            <div class="panel-heading ">
                                <h4> Countries </h4>
                            </div>
                            <div class="panel-body">
                                <div id="countries"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-12">
                            <div class="panel-heading ">
                                <h4> Cities </h4>
                            </div>
                            <div class="panel-body">
                                <div id="cities"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @else
            @if(!empty($thread))
            <div class="col-xs-12 col-md-8">
                <div class="row panel panel-default">
                    <h2 class="panel-heading">{!! $thread->subject !!} </h2>
                  <div class="panel-body">
                      <div class="col-xs-4">
                          {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                                  <!-- Message Form Input -->
                          <div class="form-group clearfix">
                              {!! Form::textarea('message', null, ['class' => 'col-xs-9', 'placeholder' => 'Send a message...']) !!}
                          </div>
                          <div class="form-group clearfix">
                              {!! Form::submit('Send', ['class' => 'btn btn-primary col-xs-12']) !!}
                          </div>
                          {!! Form::close() !!}
                      </div>
                      <div class="col-xs-8">
                        @foreach($thread->messages as $message)
                         <div class="col-xs-12 message">
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
                         </div>
                         @endforeach
                      </div>
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
@endsection

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
    $(function () {
        window.languages = Morris.Bar({
            element: 'language',
            resize: true,
            data: [
               @foreach( $stats->languages as $language => $percentage)
                    { y:'{{$language}}',  a:'{{$percentage}}'},
                @endforeach
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Percent']
        });

        window.countries = Morris.Donut({
            element: 'countries',
            resize: true,
            data: [
                @foreach( $stats->countries as $countries=> $percentage)
                    { label:'{{$countries}}',  value:'{{$percentage}}'},
                @endforeach
            ],
            colors: ['#FF0000', '#0000FF']
        });

        window.cities = Morris.Donut({
            element: 'cities',
            resize: true,
            data: [
                    @foreach( $stats->cities as $cities=> $percentage)
                { label:'{{$cities}}',  value:'{{$percentage}}'},
                @endforeach
            ],
            colors: ['#FF0000', '#0000FF']
        });
        window.ages = Morris.Bar({
            element: 'ages',
            resize: true,
            data: [
                @foreach( $stats->ages as $ages=> $percentage)
                    { y:'{{$ages}}',  a:'{{$percentage}}'},
                @endforeach
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Percent']
        });

        window.families = Morris.Donut({
            element: 'families',
            resize: true,
            data: [
                {label: "Family", value: "{{$stats->family}}" },
                {label: "Non-family", value: "{{$stats->nonfamily}}" }
            ],
            colors: ['#FF0000', '#0000FF']
        });
        window.sex = Morris.Donut({
            element: 'sex',
            resize: true,
            data: [
                {label: "Male", value: "{{$stats->male}}" },
                {label: "Female", value: "{{$stats->female}}" }
            ],
            colors: ['#FF0000', '#0000FF']
        });
        $(window).on('resize', function() {
               if (!window.recentResize) {
                  window.languages.redraw();
                  window.countries.redraw();
                  window.cities.redraw();
                  window.ages.redraw();
                  window.families.redraw();
                  window.sex.redraw();
                  window.recentResize = true;
                  setTimeout(function(){ window.recentResize = false; }, 200);
               }
            });
          });
    </script>

@endsection
