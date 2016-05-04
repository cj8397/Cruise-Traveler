@extends('layouts.scrolling')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    You are logged in as an Admin!
                </div>
                <a href="/admin/users" class="btn btn-primary btn-md">
                    <span class="glyphicon glyphicon-user"></span>View Users
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
