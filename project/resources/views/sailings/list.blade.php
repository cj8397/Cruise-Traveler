@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
<div class="container">
    <div class="container">
    <!-- Page Heading -->
    <div class="row">
        <img class="img-responsive" src="/images/searchBar.png" alt="">
        <div class="col-lg-12">
            <h1 class="page-header">All Sailings
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->

    <div class="row">
        @foreach ($sailings as $sailing)
            <div class="col-md-3 portfolio-item">
                <h2>{{$sailing->id}} {{$sailing->cruise_line}} {{$sailing->title}}</h2>
                <a href="{{ action('SailingsController@GetSailing', [$sailing->id]) }}">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="">
            </a>
            <p>200 going 80% male 20% male 12 events plan</p>
        </div>
        @endforeach
    </div>

    <hr>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="/events/1">&laquo;</a>
                </li>
                <li class="active">
                    <a href="/events/1">1</a>
                </li>
                <li>
                    <a href="/events/1">2</a>
                </li>
                <li>
                    <a href="/events/1">3</a>
                </li>
                <li>
                    <a href="/events/1">4</a>
                </li>
                <li>
                    <a href="/events/1">5</a>
                </li>
                <li>
                    <a href="/events/1">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
