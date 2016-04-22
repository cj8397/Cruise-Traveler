@extends('layouts.scrolling')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/eventform/post') }}">
                            {!! csrf_field() !!}


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Event Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('email') }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Start Date And Time</label>

                                <div class="col-md-6">
                                    <input type="datetime" class="form-control" name="start">

                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">End Date And Time</label>

                                <div class="col-md-6">
                                    <input type="datetime" class="form-control" name="end">

                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Event Description</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="desc">

                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Event Location</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="location">

                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
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
                </div>
            </div>
        </div>
    </div>
@endsection
