@extends('layouts.scrolling')

@section('content')
    @if(isset($success))
        <div class="alert alert-success">
            {{$success}}
        </div>
    @endif

    @if(isset($failure))
        <div class="alert alert-danger">
            {{$failure}}
        </div>
    @endif
    <p>{{$user_id}} {{$sailing_id}} </p>

    @include('partials/buttons/joinsailing')
    @include('partials/buttons/leavesailing')

    <a href="/usersailings" class="btn btn-primary btn-md">
        View all Sailings for user <i class="fa fa-arrow-right" aria-hidden="true"></i>
    </a>

    <a href="/sailingusers/{{$sailing_id}}">
        <button type="button" class="btn btn-primary btn-md">
            <i class="fa fa-users" aria-hidden="true"></i>View all User in sailing
        </button>
    </a>

    <a href="events/eventform/{{$sailing_id}}">
        <button type="button" class="btn btn-primary btn-md">
            <i class="fa fa-users" aria-hidden="true"></i>Create Event in Current Sailing
        </button>
    </a>
@endsection