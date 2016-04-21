@extends('app')

@section('content')

<h1>Create a Sailing</h1>

<hr/>

{!! Form::open() !!}
<div class="form-group">
  {!! Form::label('cruise_line', 'Cruise_line:') !!}
  {!! Form::text('cruise_line', null, ['class' => 'form-control']) !!}
</div>

{!! Form::close() !!}
@stop
