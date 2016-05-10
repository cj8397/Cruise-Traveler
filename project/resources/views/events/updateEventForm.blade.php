@extends('layouts.scrolling')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('events/update/save/'.$event->id) }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="sailing_id" value={!! $event->sailing_id !!}/>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Event Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{!! $event->title !!}">

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
                                    <span class="help-block">
                                        <strong> {!! $event->start_date !!}</strong>
                                    </span>
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
                                    <span class="help-block">
                                        <strong>{!! $event->end_date !!}</strong>
                                    </span>
                                    <input type="text" class="form-control" id="datetimepickersend" name="end">

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
                                    <input type="text" class="form-control" name="desc" value="{!! $event->desc !!}">

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
                                    <input type="text" class="form-control" name="location"
                                           value="{!! $event->location !!}">

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
                                        <i class="fa fa-btn fa-user"></i>Update
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
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\EventRequest') !!}
@endsection
