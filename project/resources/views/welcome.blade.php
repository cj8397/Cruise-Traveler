@extends('layouts.scrolling')

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
        <div class="row col-xs-5 col-md-5">
            <div class="col-md-5 col-xs-5">
                <iframe width="400" height="300"
                        src="https://www.youtube.com/embed/CnAUfvWlBGs"
                        frameborder="2" allowfullscreen></iframe>
            </div>
        </div>

        @if (Auth::guest())
            <div class="row col-xs-5 col-xs-offset-2 col-md-offset-2 col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <table class="tg">
                        <tr>
                            <th class="tg-amwm">Username</th>
                            <th class="tg-amwm">Password</th>
                            <th class="tg-amwm">Role</th>
                        </tr>
                        <tr>
                            <td class="tg-baqh">vacation@gmail.com</td>
                            <td class="tg-baqh">password</td>
                            <td class="tg-baqh">Vacationer</td>
                        </tr>
                        <tr>
                            <td>eventhost@gmail.com</td>
                            <td>password</td>
                            <td>Host</td>
                        </tr>
                        <tr>
                            <td>eventparticipant@gmail.com</td>
                            <td>password</td>
                            <td>Participant</td>
                        </tr>
                        <tr>
                            <td>admin@admin.com</td>
                            <td>adminpassword</td>
                            <td>Admin</td>
                        </tr>
                    </table>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your
                                        Password?</a>
                            </div>
                            </div>
                        </form>
                    </div>
            </div>
                @endif
        </div>
            <hr class="style-eight col-md-12 col-xs-12">

            <div class="row">
                <div class="panel panel-default col-md-3 col-xs-12 text-center">
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h2>Caribbean</h2>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
                        <hr>
                </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h5>
                            {{--{!! $caribsail->id !!} | --}}
                            {!! $caribsail->cruise_line !!}
                        </h5>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                        <a href="{{ action('SailingsController@GetSailing', [$caribsail->id]) }}">
                            <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                    </a>
                </div>

                    @if(!empty($caribsail['stats']))
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>Confirmed Passengers: {{$caribsail['stats']->total}}  </p>
                            </div>
                            <div class="panel-body col-md-6 col-xs-12">
                                <p> Percent Families: {{ $caribsail['stats']->family }} %</p>
                            </div>
                            <div class="panel-body col-xs-12">
                                <h4> Languages: </h4>
                                <ul>
                                    @foreach($caribsail['stats']->languages as $language => $value)
                                        <li> <b>{{ $language }} </b> - {{ $value }} % </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-body col-xs-12">
                                <h4> Cities: </h4>
                                <ul>
                                    @foreach($caribsail['stats']->cities as $city => $value)
                                        <li> <b>{{ $city }} </b> - {{ $value }} % </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>56% Passenger over 50yrs/old</p>
                            </div>
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>65% Passengers are single</p>
                            </div>
                        </div>
                    @endif

                    @if(!empty($caribsail['stats']))
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <h4>Events</h4>
                            @foreach($caribsail['events'] as $event)
                                <div class="panel panel-primary col-md-4 col-xs-12">
                                    <div class="panel-heading">{{ $event->title }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <h4>Events</h4>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-1 col-xs-12"></div>

                <div class="panel panel-default col-md-3 col-xs-12">
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h2>Mediterranean</h2>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
                        <hr>
                </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h5>
                            {{--{!! $medsail->id !!} | --}}
                            {!! $medsail->cruise_line !!}
                        </h5>
                    </div>
                    <div class="row row-centered col-md-12 col-xs-12">
                        <a href="{{ action('SailingsController@GetSailing', [$medsail->id]) }}">
                            <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                        </a>
                    </div>

                    @if(!empty($medsail['stats']))
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>Confirmed Passengers: {{$medsail['stats']->total}}  </p>
                            </div>
                            <div class="panel-body col-md-6 col-xs-12">
                                <p> Percent Families: {{ $medsail['stats']->family }} %</p>
                            </div>
                            <div class="panel-body col-xs-12">
                                <h4> Languages: </h4>
                                <ul>
                                    @foreach($medsail['stats']->languages as $language => $value)
                                        <li> <b>{{ $language }} </b> - {{ $value }} % </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-body col-xs-12">
                                <h4> Cities: </h4>
                                <ul>
                                    @foreach($medsail['stats']->cities as $city => $value)
                                        <li> <b>{{ $city }} </b> - {{ $value }} % </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>56% Passenger over 50yrs/old</p>
                            </div>
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>65% Passengers are single</p>
                            </div>
                        </div>
                    @endif
                    @if(!empty($medsail['stats']))
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <h4>Events</h4>
                                @foreach($medsail['events'] as $event)
                                    <div class="panel panel-primary col-md-4 col-xs-12">
                                        <div class="panel-heading">{{ $event->title }}</div>
                                    </div>
                                @endforeach
                         </div>
                    @else
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <h4>Events</h4>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                        </div>
                    @endif
            </div>

                <div class="col-md-1 col-xs-12"></div>

                <div class="panel panel-default col-md-3 col-xs-12 text-center">
                    <div class="row col-md-12 col-xs-12 col-lg-12">
                        <h2>Alaska</h2>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                        <a href="/sailings">
                            <button type="button" class="btn btn-primary btn-md">
                                <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                            </button>
                        </a>
                        <hr>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h5>
                            {{--{!! $alassail->id !!} |--}}
                            {!! $alassail->cruise_line !!}
                        </h5>
                    </div>
                    <div class="row row-centered col-md-12 col-xs-12">
                        <a href="{{ action('SailingsController@GetSailing', [$alassail->id]) }}">
                            <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                        </a>
                    </div>

                    @if(!empty($alassail['stats']))
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>Confirmed Passengers: {{$alassail['stats']->total}}  </p>
                            </div>
                            <div class="panel-body col-md-6 col-xs-12">
                                <p> Percent Families: {{ $alassail['stats']->family }} %</p>
                            </div>
                            <div class="panel-body col-xs-12">
                                <h4> Languages: </h4>
                                <ul>
                                    @foreach($alassail['stats']->languages as $language => $value)
                                        <li> <b>{{ $language }} </b> - {{ $value }} % </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-body col-xs-12">
                                <h4> Cities: </h4>
                                <ul>
                                    @foreach($alassail['stats']->cities as $city => $value)
                                        <li> <b>{{ $city }} </b> - {{ $value }} % </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>56% Passenger over 50yrs/old</p>
                            </div>
                            <div class="panel-body col-md-6 col-xs-12">
                                <p>65% Passengers are single</p>
                            </div>
                        </div>
                    @endif

                    @if(!empty($alassail['stats']))
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <h4>Events</h4>
                            @foreach($alassail['events'] as $event)
                                <div class="panel panel-primary col-md-4 col-xs-12">
                                    <div class="panel-heading">{{ $event->title }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                            <h4>Events</h4>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                            <div class="panel panel-primary col-md-4 col-xs-12">
                                <div class="panel-heading">Matt's party</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
    </div>
@endsection
