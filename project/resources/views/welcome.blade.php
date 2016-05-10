@extends('layouts.scrolling')

@section('styles')
    <style>
        /*.intro {*/
            /*background-image: url("images/intro_image.jpg");*/
            /*background-size: 100% 100%;*/
        /*}*/
        .events .col-xs-12 {
            margin-bottom: 10px;
            padding: 0;
        }
    </style>
@endsection

@section('content')

    <!-- Intro Section -->
    <div class="container-fluid">
        @if (Auth::guest())
            <div class="intro clearfix">
                <div class="col-xs-12 col-sm-6 ">
                    <iframe src="https://www.youtube.com/embed/CnAUfvWlBGs"
                            frameborder="2" allowfullscreen></iframe>
                </div>
                <div class="col-xs-12 col-sm-6  login">
                    <div class="panel panel-default">
                        <div class="panel-heading login"><h4>Login</h4></div>
                            <table class="tg table table-responsive">
                                <tr class="success">
                                    <th class="tg-amwm">Username</th>
                                    <th class="tg-amwm">Password</th>
                                </tr>
                                <tr class="warning">
                                    <td class="tg-baqh">vacation@gmail.com</td>
                                    <td class="tg-baqh">password</td>
                                </tr>
                                <tr class="info">
                                    <td>eventhost@gmail.com</td>
                                    <td>password</td>
                                </tr>
                                <tr class="danger">
                                    <td>eventparticipant@gmail.com</td>
                                    <td>password</td>
                                </tr>
                                <tr class="active">
                                    <td>admin@admin.com</td>
                                    <td>adminpassword</td>
                                </tr>
                            </table>
                            <div class="panel-body">
                                <form class="form-vertical clearfix" role="form" method="POST" action="{{ url('/login') }}">
                                    {!! csrf_field() !!}
                                    <div class="col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-xs-12 control-label">Email:</label>
                                        <div class="col-xs-12">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-xs-12 control-label">Password:</label>
                                        <div class="col-xs-12">
                                            <input type="password" class="form-control" name="password">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 buttons">
                                        <button type="submit" class="btn btn-primary col-xs-3">
                                            <i class="fa fa-btn fa-sign-in"></i>Login
                                        </button>
                                        <div class="col-xs-5"><input type="checkbox" name="remember"> <span>Remember Me?</span></div>
                                        <div class="col-xs-4"><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Password?</a></div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        @endif
            <div class="col-xs-12">
                <div class="col-sm-4 col-xs-12 tile">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <a href="/sailings?destination=Caribbean" class="clearfix"><h2>Caribbean</h2></a>
                        </div>
                        <div class="panel-body">
                            <a href="{{ action('SailingsController@GetSailing', [$caribsail->id]) }}">
                                <h4>{!! $caribsail->cruise_line !!}</h4>
                                <img class="img-responsive" src="/images/caribbean_thumb.png" alt="">
                            </a>
                            @if(!empty($caribsail['stats']))
                                @if($caribsail['stats']->total != null)
                                    <div class="stats clearfix panel panel-default">
                                        <div class="col-md-5 col-xs-12">
                                            <div>
                                                <p><b>Confirmed:</b> {{$caribsail['stats']->total}}  </p>
                                            </div>
                                            <div>
                                                <h4> Languages: </h4>
                                                <ul>
                                                    @foreach($caribsail['stats']->languages as $language => $value)
                                                        <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12 cities">
                                            <div>
                                                <p><b>Families:</b> {{ $caribsail['stats']->family }}%</p>
                                            </div>
                                            <div>
                                                <h4> Cities: </h4>
                                                <ul>
                                                    @foreach($caribsail['stats']->cities as $city => $value)
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
                            <div class="events">
                                @if(!empty($caribsail['events']))
                                    <h4>Events</h4>
                                    @foreach($caribsail['events'] as $event)
                                        <div class="col-xs-12">
                                            <a href="/events/detail/{{$event->id}}" class="btn btn-primary btn-md">{{ $event->title }}</a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @for($i = 0; $i < 3; $i++)
                                            <div class="col-xs-12">
                                                <a href="/sailings?destination=Caribbean" class="btn btn-primary btn-md">
                                                    <div class="panel-heading">Cocktail Party</div>
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 tile">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <a href="/sailings?destination=Europe/Mediterranean" class="clearfix"><h2>Mediterranean</h2></a>
                        </div>
                        <div class="panel-body">
                            <a href="{{ action('SailingsController@GetSailing', [$medsail->id]) }}">
                                <h4>{!! $medsail->cruise_line !!}</h4>
                                <img class="img-responsive" src="/images/mediterranean_thumb.png" alt="">
                            </a>
                            @if(!empty($medsail['stats']))
                                @if($medsail['stats']->total != null)
                                    <div class="stats clearfix panel panel-default">
                                        <div class="col-md-5 col-xs-12">
                                            <div>
                                                <p><b>Confirmed:</b> {{$medsail['stats']->total}}  </p>
                                            </div>
                                            <div>
                                                <h4> Languages: </h4>
                                                <ul>
                                                    @foreach($medsail['stats']->languages as $language => $value)
                                                        <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12 cities">
                                            <div>
                                                <p><b>Families:</b> {{ $medsail['stats']->family }}%</p>
                                            </div>
                                            <div>
                                                <h4> Cities: </h4>
                                                <ul>
                                                    @foreach($medsail['stats']->cities as $city => $value)
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
                            <div class="events">
                                @if(!empty($medsail['events']))
                                    <h4>Events</h4>
                                    @foreach($medsail['events'] as $event)
                                        <div class="col-xs-12">
                                            <a href="/events/detail/{{$event->id}}" class="btn btn-primary btn-md">{{ $event->title }}</a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @for($i = 0; $i < 3; $i++)
                                            <div class="col-xs-12">
                                                <a href="/sailings?destination=Caribbean" class="btn btn-primary btn-md">
                                                    <div class="panel-heading">Cocktail Party</div>
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 tile">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <a href="/sailings?destination=Alaska" class="clearfix"><h2>Alaska</h2></a>
                        </div>
                        <div class="panel-body">
                            <a href="{{ action('SailingsController@GetSailing', [$alassail->id]) }}">
                                <h4>{!! $alassail->cruise_line !!}</h4>
                                <img class="img-responsive" src="/images/alaskan_thumb.png" alt="">
                            </a>
                            @if(!empty($alassail['stats']))
                                @if($alassail['stats']->total != null)
                                    <div class="stats clearfix panel panel-default">
                                        <div class="col-md-5 col-xs-12">
                                            <div>
                                                <p><b>Confirmed:</b> {{$alassail['stats']->total}}  </p>
                                            </div>
                                            <div>
                                                <h4> Languages: </h4>
                                                <ul>
                                                    @foreach($alassail['stats']->languages as $language => $value)
                                                        <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12 cities">
                                            <div>
                                                <p><b>Families:</b> {{ $alassail['stats']->family }}%</p>
                                            </div>
                                            <div>
                                                <h4> Cities: </h4>
                                                <ul>
                                                    @foreach($alassail['stats']->cities as $city => $value)
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
                            <div class="events">
                                @if(!empty($alassail['events']))
                                    <h4>Events</h4>
                                    @foreach($alassail['events'] as $event)
                                        <div class="col-xs-12">
                                            <a href="/events/detail/{{$event->id}}" class="btn btn-primary btn-md">{{ $event->title }}</a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @for($i = 0; $i < 3; $i++)
                                            <div class="col-xs-12">
                                                <a href="/sailings?destination=Caribbean" class="btn btn-primary btn-md">
                                                    <div class="panel-heading">Cocktail Party</div>
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
