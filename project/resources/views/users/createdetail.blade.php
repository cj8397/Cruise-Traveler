@extends('layouts.scrolling')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create User Details</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ action('UserController@createUserDetails') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first">

                                    @if ($errors->has('first'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last">

                                    @if ($errors->has('last'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="dob">

                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sex">

                                    @if ($errors->has('sex'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Primary Language</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lang">

                                    @if ($errors->has('lang'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lang') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Country</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="country">

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Ethnicity</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ethnicity">

                                    @if ($errors->has('ethnicity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ethnicity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hobby') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Hobby</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="hobby">

                                    @if ($errors->has('hobby'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('hobby') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Family</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="family">

                                    @if ($errors->has('family'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('co_travellers') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Co-Travellers</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="co_travellers">

                                    @if ($errors->has('co_travellers'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('co_travellers') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Region</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="region">

                                    @if ($errors->has('region'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">City</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="city">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
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
