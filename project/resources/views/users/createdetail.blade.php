@extends('layouts.scrolling')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create User Details</div>
                    <div class="panel-body">
                        <form id="createDetailForm" class="form-horizontal" role="form" method="POST"
                              action="{{ action('UserController@createUserDetails') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first" placeholder="John">

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
                                    <input type="text" class="form-control" name="last" placeholder="Smith">

                                    @if ($errors->has('last'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div><strong>All data collected below will remain anonymous, and will not be shared with other users.</strong></div><br/>

                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                  <div>
                                    <input type="text" class="form-control" name="dob" placeholder="YYYY/MM/DD">
                                  </div>

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
                                  <div>
                                    Male <input type="radio" class="" name="sex" value="1"><br/>
                                    Female <input type="radio" class="" name="sex" value="0">
                                  </div>
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
                                  <select name="lang" class="form-control">
                                    <option value="English">English</option>
                                    <option value="French">French</option>
                                    <option value="Cantonese">Cantonese</option>
                                    <option value="Mandarin">Mandarin</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Hungarion">Hungarion</option>
                                    <option value="Portugese">Portugese</option>
                                    <option value="Jamacian">Jamacian</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Croatian">Croatian</option>
                                  </select>

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
                                    <input type="text" class="form-control" name="country" placeholder="Canada">

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Region</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="region" placeholder="BC">

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
                                    <input type="text" class="form-control" name="city" placeholder="Vancouver">

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
                                    <input type="text" class="form-control" name="address" placeholder="1234 1st Street">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ethinicity') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Ethinicity</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ethnicity" placeholder="White">

                                    @if ($errors->has('ethinicity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ethinicity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hobby') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Hobby</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="hobby" placeholder="Swimming">

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
                                  <div>
                                  Yes <input type="radio" class="" name="family" value="0"><br/>
                                    No <input type="radio" class="" name="family" value="1">
                                  </div>

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
                                  <div>
                                  Yes <input type="radio" class="" name="co_travellers" value="0"><br/>
                                    No <input type="radio" class="" name="co_travellers" value="1">
                                  </div>

                                    @if ($errors->has('co_travellers'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('co_travellers') }}</strong>
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
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UserDetailsRequest', '#createDetailForm'); !!}
@endsection
