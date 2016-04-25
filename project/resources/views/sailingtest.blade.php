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
    <p> HEY! GOT RID OF .idea/workspace</p>
    <p>{{$user_id}} {{$sailing_id}} </p>
    <a href="/joinsailing/{{$user_id}}/{{$sailing_id}}"><button type="button" class="btn btn-primary btn-md">Join</button></a>
    <a href="/leavesailing/{{$user_id}}/{{$sailing_id}}"><button type="button" class="btn btn-primary btn-md">Leave</button></a>
@endsection