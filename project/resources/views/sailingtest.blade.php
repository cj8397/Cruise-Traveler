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
<<<<<<< HEAD
    <a href="/joinsailing/{{$user_id}}/{{$sailing_id}}">
        <button type="button" class="btn btn-primary btn-md">Join</button>
    </a>
    <a href="/leavesailing/{{$user_id}}/{{$sailing_id}}">
        <button type="button" class="btn btn-primary btn-md">Leave</button>
    </a>
=======
    <a href="/joinsailing/{{$user_id}}/{{$sailing_id}}"><button type="button" class="btn btn-primary btn-md">Join</button></a>
    <a href="/leavesailing/{{$user_id}}/{{$sailing_id}}"><button type="button" class="btn btn-primary btn-md">Leave</button></a>
>>>>>>> 9c59078fe7a0c1354e78bb50dda63768c539faca
@endsection