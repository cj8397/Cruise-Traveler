@extends('layouts.scrolling')

@section('content')
<<<<<<< HEAD
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
=======
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
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
@endsection
