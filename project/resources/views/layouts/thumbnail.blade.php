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
            <a class="brand">
                <img src="https://placehold.it/750x450">
            </a>
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
                            <li><a href="#">Last Update: May 9th, 2016 @ 15:15 </a></li>
                            <li><a href="https://docs.google.com/spreadsheets/d/1KQc5cRAnqdWS55JQb59NHHYKRtqtslBXlHjbWU2QIqc/edit#gid=0">SCRUM WOKRBOOK</a></li>
                            <li><a href="https://docs.google.com/document/d/1yIuRZO1HJ71moInaR_B1Y0mb6yfwxB9oClgWSx5CTpw/edit#heading=h.tphyqzr77ydu">Design Model</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
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
@include('flash::message')
@if(isset($success))
    <div class="alert alert-success">
        {{$success}}
    </div>
@endif

@if(isset($failure))
    <div class="alert alert-danger">
        {{$failure}}
    </div>
@endif

@yield('content')

<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
</footer>


<!-- JavaScripts -->
<script type="text/javascript" src="{{ URL::asset('scripts/jquery.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@yield('scripts')
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
