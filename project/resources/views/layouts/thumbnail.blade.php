<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cruise Connect</title>

    {{--<!-- Fonts -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}

    {{--<!-- Styles -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}

    <!-- link to sass files -->
    {{-- <link href="{{ elixir('styles/app.styles') }}" rel="stylesheet"> --}}

    <!-- custom theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('styles/4-col-portfolio.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('styles/custom/nav.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('styles/custom/site.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('styles/custom/tiles.css') }}" />
    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/sailings') }}">Sailings</a>
                </li>
                @if (!Auth::guest())
                    <li><a href="{{ url('events/userevents') }}">Events</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Documentation <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Last Update: May 11th, 2016 @ 15:15 </a></li>
                            <li><a href="https://docs.google.com/spreadsheets/d/1KQc5cRAnqdWS55JQb59NHHYKRtqtslBXlHjbWU2QIqc/edit#gid=0">SCRUM WOKRBOOK</a></li>
                            <li><a href="https://docs.google.com/document/d/1yIuRZO1HJ71moInaR_B1Y0mb6yfwxB9oClgWSx5CTpw/edit#heading=h.tphyqzr77ydu">Design Model</a></li>
                        </ul>
                    </li>
                    {{--<li><a href="{{ url('/') }}">Login</a></li>--}}
                    <li><a href="#loginModal" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    <li><a href="#registerModal" data-toggle="modal" data-target="#registerModal">Register</a></li>
                @else
                    <li class="dropdown">
                    {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                         {{ Auth::user()->name }} <span class="caret"></span>
                     </a>--}}

                    {{--<ul class="dropdown-menu" role="menu">--}}
                            <li>
                                <a href="{{ url('/users/userprofile/'.Auth::user()->id) }}">Profile</a>
                            </li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                @if (Auth::user()->isAdmin())
                        <li>
                            <a href="{{ url('/admin/home') }}"><i class="glyphicon glyphicon-circle-arrow-left"></i>Admin</a>
                        </li>
                        @endif
                        {{--</ul>--}}
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="loginModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                {{--<table class="tg table table-responsive">--}}
                    {{--<tr class="success">--}}
                        {{--<th class="tg-amwm">Username</th>--}}
                        {{--<th class="tg-amwm">Password</th>--}}
                    {{--</tr>--}}
                    {{--<tr class="warning">--}}
                        {{--<td class="tg-baqh">vacation@gmail.com</td>--}}
                        {{--<td class="tg-baqh">password</td>--}}
                    {{--</tr>--}}
                    {{--<tr class="info">--}}
                        {{--<td>eventhost@gmail.com</td>--}}
                        {{--<td>password</td>--}}
                    {{--</tr>--}}
                    {{--<tr class="danger">--}}
                        {{--<td>eventparticipant@gmail.com</td>--}}
                        {{--<td>password</td>--}}
                    {{--</tr>--}}
                    {{--<tr class="active">--}}
                        {{--<td>admin@admin.com</td>--}}
                        {{--<td>adminpassword</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
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
                        <div class="col-xs-5 btn"><input type="checkbox" name="remember"> <span>Remember Me?</span>
                        </div>
                        <div class="col-xs-4"><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot
                                Password?</a></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="registerModalLabel">Registration</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
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

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @include('flash::message')
    @yield('content')
    <footer>
        <p>Copyright &copy; Cruise Connect 2016</p>
    </footer>
</div>




<!-- JavaScripts -->
<script type="text/javascript" src="{{ URL::asset('scripts/jquery.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@yield('scripts')
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
