@extends('layouts.scrolling')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('styles/welcome.css') }}" />
@endsection

@section('content')

    <style type="text/css">
        ul {
            list-style-type: none;
        }

        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>
    <!-- Intro Section -->
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-6 ">
            <iframe src="https://www.youtube.com/embed/CnAUfvWlBGs"
                    frameborder="2" allowfullscreen></iframe>
        </div>
        @if (Auth::guest())
            <div class="col-xs-12 col-sm-6  login">
            <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
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
                                <label class="col-xs-12 control-label">Password</label>
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
        @endif
            </div>
            <hr class="style-eight col-md-12 col-xs-12">
            <div class="col-xs-12">
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2>Caribbean</h2>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h4>
                                    {{--{!! $medsail->id !!} | --}}
                                    {!! $caribsail->cruise_line !!}
                                </h4>
                            </div>
                            <div class="text-centered col-md-12 col-xs-12">
                                <a href="{{ action('SailingsController@GetSailing', [$caribsail->id]) }}">
                                    <img class="img-responsive" src="/images/caribbean_thumb.png" alt="">
                                </a>
                            </div>
                            <div class="col-xs-12 text-center">
                                <a href="/sailings" class="btn btn-primary btn-md">
                                    <i class="fa fa-users" aria-hidden="true"></i>All Caribbean Sailings
                                </a>
                            </div>
                            @if(!empty($caribsail['stats']))
                                @if($caribsail['stats']->total != null)
                                    <div class="stats clearfix">
                                        <div class="col-md-6 col-xs-12">
                                            <p><b>Confirmed:</b> {{$caribsail['stats']->total}}  </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <p><b>Families:</b> {{ $caribsail['stats']->family }}%</p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h4> Languages: </h4>
                                            <ul>
                                                @foreach($caribsail['stats']->languages as $language => $value)
                                                    <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h4> Cities: </h4>
                                            <ul>
                                                @foreach($caribsail['stats']->cities as $city => $value)
                                                    <li> <b>{{ $city }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
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
                            <hr />
                            <div class="events">
                                @if(!empty($caribsail['events']))
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @foreach($caribsail['events'] as $event)
                                            <div class="col-md-4 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">{{ $event->title }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @for($i = 0; $i < 3; $i++)
                                            <div class="col-md-4 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">Cocktail Party</div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2>Mediterranean</h2>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h4>
                                    {{--{!! $medsail->id !!} | --}}
                                    {!! $medsail->cruise_line !!}
                                </h4>
                            </div>
                            <div class="text-centered col-md-12 col-xs-12">
                                <a href="{{ action('SailingsController@GetSailing', [$medsail->id]) }}">
                                    <img class="img-responsive" src="/images/mediterranean_thumb.png" alt="">
                                </a>
                            </div>
                            <div class="col-xs-12">
                                <a href="/sailings" class="btn btn-primary btn-md">
                                    <i class="fa fa-users" aria-hidden="true"></i>All Mediterranean Sailings
                                </a>
                            </div>
                            @if(!empty($medsail['stats']))
                                @if($medsail['stats']->total != null)
                                    <div class="stats clearfix">
                                        <div class="col-md-6 col-xs-12">
                                            <p><b>Confirmed:</b> {{$medsail['stats']->total}}  </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <p><b>Families:</b> {{ $medsail['stats']->family }}%</p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h4> Languages: </h4>
                                            <ul>
                                                @foreach($medsail['stats']->languages as $language => $value)
                                                    <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h4> Cities: </h4>
                                            <ul>
                                                @foreach($medsail['stats']->cities as $city => $value)
                                                    <li> <b>{{ $city }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
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
                            <hr />
                            <div class="events">
                                @if(!empty($medsail['events']))
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                            @foreach($medsail['events'] as $event)
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">{{ $event->title }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                     </div>
                                @else
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @for($i = 0; $i < 3; $i++)
                                            <div class="col-md-4 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">Cocktail Party</div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2>Alaska</h2>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h4>
                                    {{--{!! $medsail->id !!} | --}}
                                    {!! $alassail->cruise_line !!}
                                </h4>
                            </div>
                            <div class="text-centered col-xs-12">
                                <a href="{{ action('SailingsController@GetSailing', [$alassail->id]) }}">
                                    <img class="img-responsive" src="/images/alaskan_thumb.png" alt="">
                                </a>
                                <a href="/sailings" class="btn btn-primary btn-md">
                                    <i class="fa fa-users" aria-hidden="true"></i>All Alaskan Sailings
                                </a>
                            </div>
                            @if(!empty($alassail['stats']))
                                @if($alassail['stats']->total != null)
                                    <div class="stats clearfix">
                                        <div class="col-md-6 col-xs-12">
                                            <p><b>Confirmed:</b> {{$alassail['stats']->total}}  </p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <p><b>Families:</b> {{ $alassail['stats']->family }}%</p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h4> Languages: </h4>
                                            <ul>
                                                @foreach($alassail['stats']->languages as $language => $value)
                                                    <li> <b>{{ $language }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h4> Cities: </h4>
                                            <ul>
                                                @foreach($alassail['stats']->cities as $city => $value)
                                                    <li> <b>{{ $city }}: </b> {{ $value }}% </li>
                                                @endforeach
                                            </ul>
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
                            <hr />
                            <div class="events">
                                @if(!empty($alassail['events']))
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @foreach($alassail['events'] as $event)
                                            <div class="col-md-4 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">{{ $event->title }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center">
                                        <h4>Top Events</h4>
                                        @for($i = 0; $i < 3; $i++)
                                            <div class="col-md-4 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">Cocktail Party</div>
                                                </div>
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
