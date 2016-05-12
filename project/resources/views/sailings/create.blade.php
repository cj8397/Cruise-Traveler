@extends('layouts.scrolling')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register A New Sailing</div>
                    <div class="panel-body">
                        <form id="createSailingForm" class="form-horizontal" role="form" method="POST"
                              action="{{ action('SailingsController@CreateSailing') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('cruise_line') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Cruise Line</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cruise_line">

                                    @if ($errors->has('cruise_line'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cruise_line') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Start Date And Time</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control date" id="datetimepickerstart" name="start">

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
                                    <input type="text" class="form-control" id="datetimepickersend" name="end">

                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('port_org') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Port of Origin</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="port_org">

                                    @if ($errors->has('port_org'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('port_org') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('port_dest') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Port of Destination</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="port_dest">

                                    @if ($errors->has('port_dest'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('port_dest') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Sailing Destination</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="destination">

                                    @if ($errors->has('destination'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('destination') }}</strong>
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
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\SailingRequest', '#createSailingform'); !!}
@endsection
