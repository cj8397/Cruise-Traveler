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
    <p>{{$user_id}} {{$event_id}} </p>
    @include('partials/buttons/joinevent')
    @include('partials/buttons/leaveevent')
    <a href="/userevents">
        <button type="button" class="btn btn-primary btn-md">View all Events for user</button>
    </a>

    <a href="/eventusers/{{$event_id}}">
        <button type="button" class="btn btn-primary btn-md">View all User in event</button>
    </a>
@endsection