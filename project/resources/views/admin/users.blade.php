@extends('layouts.scrolling')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">

                @foreach ($users as $user)
                    <div class="col-md-3 portfolio-item">
                      <a href="{{ action('AdminController@GetUser', [$user->id]) }}">
                          <img class="img-responsive" src="/images/profilepic.png" alt="">
                  </a>
                        <p>{{$user->email}}</p>

                </div>
                @endforeach

            </div>
        </div>
</div>
@endsection
