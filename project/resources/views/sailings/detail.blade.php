@extends('layouts.thumbnail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h2>
                <a href="{{ action('SailingsController@GetSailing', [$sailing->id]) }}">
                    <img class="img-responsive" src="https://placehold.it/750x450" alt="">
                </a>
            </div>
        </div>
@endsection
