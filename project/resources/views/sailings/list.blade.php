@extends('layouts.thumbnail')

@section('content')
        <!-- Page Content -->
        <div class="container">
    <!-- Page Heading -->
    <div class="row">
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
                <img class="img-responsive" src="https://placehold.it/750x450" alt="">
            </a>
        </div>
        @endforeach
    </div>

    <hr>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
