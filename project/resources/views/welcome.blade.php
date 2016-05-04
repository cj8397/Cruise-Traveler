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
<<<<<<< HEAD
        <!-- Intro Section -->
<div class="container-fluid">
    <div class="row col-xs-5 col-md-5">
        <div class="col-md-5 col-xs-5">
            <iframe width="400" height="300"
                    src="https://www.youtube.com/embed/CnAUfvWlBGs"
                    frameborder="2" allowfullscreen></iframe>
=======
    <!-- Intro Section -->
    <div class="container-fluid">
        <div class="row col-xs-5 col-md-5">
            <div class="col-md-5 col-xs-5">
                <iframe width="400" height="300"
                        src="https://www.youtube.com/embed/CnAUfvWlBGs"
                        frameborder="2" allowfullscreen></iframe>
            </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        </div>
    </div>

<<<<<<< HEAD
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
=======
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
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
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
<<<<<<< HEAD
                                @endif
=======
                                    @endif
                            </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                            </div>
                        </div>

<<<<<<< HEAD
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
=======
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                </div>
                            </div>
                            </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

<<<<<<< HEAD
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your
                                    Password?</a>
=======
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your
                                        Password?</a>
                            </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
<<<<<<< HEAD
        <hr class="style-eight col-md-12 col-xs-12">

        <div class="row">
            <div class="panel panel-default col-md-3 col-xs-12 text-center">
                <div class="row col-md-12 col-xs-12 text-center">
                    <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
=======
            <hr class="style-eight col-md-12 col-xs-12">

            <div class="row">
                <div class="panel panel-default col-md-3 col-xs-12 text-center">
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h2>Caribbean</h2>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
<<<<<<< HEAD
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <h2>Caribbean</h2>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4 text-center">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Gender</h5></li>
                            <li class="list-group-item">Male (67%)</li>
                            <li class="list-group-item">Female (33%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4 text-center">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">Canada</li>
                            <li class="list-group-item">USA</li>
                            <li class="list-group-item">Mexico</li>
                            <li class="list-group-item">England</li>
                            <li class="list-group-item">France</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4 text-center">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">French</li>
                            <li class="list-group-item">Spanish</li>
                            <li class="list-group-item">Chinese</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-xs-12"></div>

            <div class="panel panel-default col-md-3 col-xs-12">
                <div class="row row-centered col-md-12 col-xs-12">
                    <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <h2>Mediterranean</h2>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Gender</h5></li>
                            <li class="list-group-item">Male (50%)</li>
                            <li class="list-group-item">Female (50%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">Spain</li>
                            <li class="list-group-item">China</li>
                            <li class="list-group-item">USA</li>
                            <li class="list-group-item">England</li>
                            <li class="list-group-item">Australia</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">French</li>
                            <li class="list-group-item">Porturguese</li>
                            <li class="list-group-item">Spanish</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-xs-12"></div>

            <div class="panel panel-default col-md-3 col-xs-12">
                <div class="row row-centered col-md-12 col-xs-12">
                    <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
=======
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

                    <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                        <div class="panel col-md-4 col-xs-4 text-center">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Companions</h5></li>
                                <li class="list-group-item">With Family (67%)</li>
                                <li class="list-group-item">Traveling Alone (33%)</li>
                            </ul>
                        </div>
                        <div class="panel col-md-4 col-xs-4 text-center">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Countries</h5></li>
                                <li class="list-group-item">Canada</li>
                                <li class="list-group-item">USA</li>
                                <li class="list-group-item">Mexico</li>
                            </ul>
                        </div>
                        <div class="panel col-md-4 col-xs-4 text-center">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Languages</h5></li>
                                <li class="list-group-item">English</li>
                                <li class="list-group-item">French</li>
                                <li class="list-group-item">Spanish</li>
                            </ul>
                        </div>
                    </div>

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
                </div>

                <div class="col-md-1 col-xs-12"></div>

                <div class="panel panel-default col-md-3 col-xs-12">
                    <div class="row col-md-12 col-xs-12 text-center">
                        <h2>Mediterranean</h2>
                    </div>
                    <div class="row col-md-12 col-xs-12 text-center">
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
<<<<<<< HEAD
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <h2>Alaska</h2>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Gender</h5></li>
                            <li class="list-group-item">Male (40%)</li>
                            <li class="list-group-item">Female (60%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">China</li>
                            <li class="list-group-item">Russia</li>
                            <li class="list-group-item">Australia</li>
                            <li class="list-group-item">Canada</li>
                            <li class="list-group-item">Brazil</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">Chinese</li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">Spanish</li>
                            <li class="list-group-item">French</li>
                        </ul>
                    </div>
=======
                        <hr>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
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

                    <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                        <div class="panel col-md-4 col-xs-4">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Companion</h5></li>
                                <li class="list-group-item">With family (50%)</li>
                                <li class="list-group-item">Traveling alone (50%)</li>
                            </ul>
                        </div>
                        <div class="panel col-md-4 col-xs-4">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Countries</h5></li>
                                <li class="list-group-item">Spain</li>
                                <li class="list-group-item">China</li>
                                <li class="list-group-item">USA</li>
                            </ul>
                        </div>
                        <div class="panel col-md-4 col-xs-4">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Languages</h5></li>
                                <li class="list-group-item">English</li>
                                <li class="list-group-item">French</li>
                                <li class="list-group-item">Porturegese</li>
                            </ul>
                        </div>
                    </div>

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
            </div>
<<<<<<< HEAD
        </div>
</div>
=======
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b

                <div class="col-md-1 col-xs-12"></div>

<<<<<<< HEAD
{{--<!-- Contact Section -->--}}
{{--<section id="contact" class="contact-section">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12">--}}
{{--<h1>Contact Section</h1>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
=======
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

                    <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                        <div class="panel col-md-4 col-xs-4">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Companion</h5></li>
                                <li class="list-group-item">With family (40%)</li>
                                <li class="list-group-item">Traveling alone (60%)</li>
                            </ul>
                        </div>
                        <div class="panel col-md-4 col-xs-4">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Countries</h5></li>
                                <li class="list-group-item">China</li>
                                <li class="list-group-item">Russia</li>
                                <li class="list-group-item">Australia</li>
                            </ul>
                        </div>
                        <div class="panel col-md-4 col-xs-4">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>Languages</h5></li>
                                <li class="list-group-item">Chinese</li>
                                <li class="list-group-item">English</li>
                                <li class="list-group-item">Spanish</li>
                            </ul>
                        </div>
                    </div>

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
                </div>
            </div>
    </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
@endsection
