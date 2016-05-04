@extends('layouts.scrolling')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 portfolio-item">
                        <a href="{{ action('AdminController@UpdateUser', [$user->id]) }}">
                            <img class="img-responsive" src="/images/profilepic.png" alt="">
                        </a>
                        <p>{{$user->email}}</p>

                    </div>

                </div>
            </div>
        </div>
@endsection
