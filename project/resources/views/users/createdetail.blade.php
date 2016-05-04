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
                                    <input type="checkbox" class="" name="family">

                                    @if ($errors->has('family'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('0-2') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">0-2</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="0-2">

                                    @if ($errors->has('0-2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('0-2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('2-5') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">2-5</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="3-5">

                                    @if ($errors->has('2-5'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('2-5') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('6-12') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">6-12</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="6-12">

                                    @if ($errors->has('6-12'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('6-12') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('13-17') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">13-17</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="13-17">

                                    @if ($errors->has('13-17'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('13-17') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('18-24') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">18-24</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="hobby">

                                    @if ($errors->has('18-24'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('18-24') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('25-29') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">25-29</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="25-29">

                                    @if ($errors->has('25-29'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('25-29') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('30-39') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">30-39</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="30-39">

                                    @if ($errors->has('30-39'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('30-39') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('40-49') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">40-49</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="40-49">

                                    @if ($errors->has('40-49'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('40-49') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('50-59') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">50-59</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="50-59">

                                    @if ($errors->has('50-59'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('50-59') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('60-74') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">60-74</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="60-74">

                                    @if ($errors->has('60-74'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('60-74') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('75+') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">75+</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="75+">

                                    @if ($errors->has('75+'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('75+') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('co_travellers') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Co-Travellers</label>
                                <div class="col-md-6">
                                    <input type="checkbox" class="" name="co_travellers">

                                    @if ($errors->has('co_travellers'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('co_travellers') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('0-2') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">0-2</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="0-2">

                                    @if ($errors->has('0-2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('0-2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('2-5') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">2-5</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="3-5">

                                    @if ($errors->has('2-5'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('2-5') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('6-12') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">6-12</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="6-12">

                                    @if ($errors->has('6-12'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('6-12') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('13-17') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">13-17</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="13-17">

                                    @if ($errors->has('13-17'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('13-17') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('18-24') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">18-24</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="hobby">

                                    @if ($errors->has('18-24'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('18-24') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('25-29') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">25-29</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="25-29">

                                    @if ($errors->has('25-29'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('25-29') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('30-39') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">30-39</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="30-39">

                                    @if ($errors->has('30-39'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('30-39') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('40-49') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">40-49</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="40-49">

                                    @if ($errors->has('40-49'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('40-49') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('50-59') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">50-59</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="50-59">

                                    @if ($errors->has('50-59'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('50-59') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('60-74') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">60-74</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="60-74">

                                    @if ($errors->has('60-74'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('60-74') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('75+') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">75+</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="75+">

                                    @if ($errors->has('75+'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('75+') }}</strong>
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
    </div>
@endsection
