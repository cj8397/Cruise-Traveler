@extends('layouts.scrolling')

@section('content')
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

                            <div><h3>All data collected below will remain anonymous, and will not be shared with other users.</h3></div>

                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="dob">(YYYY/MM/DD)

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
                                    Male <input type="checkbox" class="" name="sex" value="1"><br />
                                    Female <input type="checkbox" class="" name="sex" value="0">

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
                                    <input type="text" class="form-control" name="country">

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

                            <div class="form-group{{ $errors->has('ethinicity') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Ethinicity</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ethnicity">

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
                                  <input type="hidden" class="" name="family" value="0">
                                    <input type="checkbox" class="" name="family" value="1">

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
                                  <input type="hidden" class="" name="co_travellers" value="0">
                                    <input type="checkbox" class="" name="co_travellers" value="1">

                                    @if ($errors->has('co_travellers'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('co_travellers') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('two') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">0-2</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="two">

                                    @if ($errors->has('two'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('two') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('five') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">2-5</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="five">

                                    @if ($errors->has('five'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('five') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('twelve') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">6-12</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="twelve">

                                    @if ($errors->has('twelve'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('twelve') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('seventeen') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">13-17</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="seventeen">

                                    @if ($errors->has('seventeen'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('seventeen') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('twentyfour') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">18-24</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="twentyfour">

                                    @if ($errors->has('twentyfour'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('twentyfour') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('twentynine') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">25-29</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="twentynine">

                                    @if ($errors->has('twentynine'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('twentynine') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('thirtynine') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">30-39</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="thirtynine">

                                    @if ($errors->has('thirtynine'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('thirtynine') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fourtynine') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">40-49</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="fourtynine">

                                    @if ($errors->has('fourtynine'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fourtynine') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fiftynine') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">50-59</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="fiftynine">

                                    @if ($errors->has('fiftynine'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fiftynine') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('seventyfour') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">60-74</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="seventyfour">

                                    @if ($errors->has('seventyfour'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('seventyfour') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('seventyfive') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">75+</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="seventyfive">

                                    @if ($errors->has('seventyfive'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('seventyfive') }}</strong>
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
