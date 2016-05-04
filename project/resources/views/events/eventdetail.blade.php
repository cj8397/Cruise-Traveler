@extends('layouts.scrolling')

@section('content')
    <img class="img-responsive" src="/426631.jpg" alt="">
<<<<<<< HEAD
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
        <div class="panel panel-default col-md-6 col-xs-12">
            <div class="panel panel-heading">{!! $event->title !!}</div>
            <div class="panel panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        @if(isset($currentUser) && $currentUser->role == 'Host')
                        <a href="{{ url('events/update/'.$event->id) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Update Event
                            </button>
                        </a>
                        <a href="{{ url('events/delete/'.$event->id) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Delete Event
                            </button>
                        </a>
                        @endif

                        @if(!isset($currentUser))
                        @include('partials.buttons.joinevent')
                        @endif
                        @if(isset($currentUser) && $currentUser->role != 'Host')
                        @include('partials.buttons.leaveevent')
                            @endif
                    </li>
                    @if(isset($host))
                    <li class="list-group-item">
                        <strong>Event Host</strong>
                        <p class="alert alert-info center-block">
                            {!! $host->userdetails->first." ".$host->userdetails->last !!}
                        </p>
                    </li>
                    @endif
                    <li class="list-group-item">
                       <strong>Start Time!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->start_date !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>End Time!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->end_date !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Location!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->location !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Description!</strong>
                        <p class="alert alert-info center-block">
                            {!! $event->desc !!}
                        </p>
                    </li>
                </ul>
            </div>
        </div>
            @if(isset($thread))
            <div class="col-xs-12">
                <div class="row panel panel-default">
                  <div class="panel-heading">
                    <h2>{!! $thread->subject !!}</h2>
                  </div>
                  <div class="panel panel-default">
                    @foreach($thread->messages as $message)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->email !!}" class="img-circle">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">{!! $message->user->email !!}</h5>
                                <p>{!! $message->body !!}</p>
                                <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <h3>Add a new message</h3>
                    {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                    <!-- Message Form Input -->
                    <div class="form-group">
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Submit Form Input -->
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
                </div>
                @endif
            </div>
    </div>
    @if(isset($members) && isset($currentUser))
    <div class="row col-md-5 col-md-offset-1 col-xs-12">
        <div class="panel panel-default col-md-12 col-xs-12">
            <div class="panel panel-heading">Participants</div>
            <div class="panel panel-body">
                <div class="row">
                    @foreach ($members as $mem)
                        <a class="col-xs-4 col-md-4" href="/users/{!! $mem->user_id !!}">
                            <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                            <span class="label label-default label-pill">{!! $mem->userdetails->first." ".$mem->userdetails->last!!}</span>
                        </a>
                    @endforeach
=======
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default col-md-6 col-xs-12">
                    <div class="panel panel-heading">{!! $event->title !!}</div>
                    <div class="panel panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                @if(isset($currentUser) && $currentUser->role == 'Host')
                                    <a href="{{ url('events/update/'.$event->id) }}">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Update Event
                                        </button>
                        </a>
                                    <a href="{{ url('events/delete/'.$event->id) }}">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Delete Event
                                        </button>
                        </a>
                                @endif

                                @if(!isset($currentUser))
                                    @include('partials.buttons.joinevent')
                                @endif
                                @if(isset($currentUser) && $currentUser->role != 'Host')
                                    @include('partials.buttons.leaveevent')
                                @endif
                            </li>
                            @if(isset($host))
                                <li class="list-group-item">
                                    <strong>Event Host</strong>
                                    <p class="alert alert-info center-block">
                                        {!! $host->userdetails->first." ".$host->userdetails->last !!}
                                    </p>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <strong>Start Time!</strong>
                                <p class="alert alert-info center-block">
                                    {!! $event->start_date !!}
                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong>End Time!</strong>
                                <p class="alert alert-info center-block">
                                    {!! $event->end_date !!}
                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong>Location!</strong>
                                <p class="alert alert-info center-block">
                                    {!! $event->location !!}
                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong>Description!</strong>
                                <p class="alert alert-info center-block">
                                    {!! $event->desc !!}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(isset($currentUser))
                    <div class="panel panel-default col-md-6 col-xs-12">
                        <div class="panel panel-heading">Message Boards!</div>
                        <div class=" panel panel-body">
                            <div class="row">
                                <a class="col-xs-3 col-md-3">
                                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                    <span class="label label-default label-pill">Cheng!</span>
                                </a>
                                <p class="alert alert-info col-xs-9 col-md-9">Cheng just Joined the Event! say HI!</p>
                            </div>
                            <div class="row">
                                <p class="alert alert-success col-xs-9 col-md-9">Lets get the party started!</p>
                                <a class="col-xs-3 col-md-3">
                                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                    <span class="label label-default label-pill">Cheng!</span>
                                </a>
                            </div>
            </div>
        </div>
                @endif
            </div>
        </div>
        @if(isset($members) && isset($currentUser))
            <div class="row col-md-5 col-md-offset-1 col-xs-12">
                <div class="panel panel-default col-md-12 col-xs-12">
                    <div class="panel panel-heading">Participants</div>
                    <div class="panel panel-body">
                        <div class="row">
                            @foreach ($members as $mem)
                                <a class="col-xs-4 col-md-4" href="/users/userprofile/{!! $mem->user_id !!}">
                            <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                    <span class="label label-default label-pill">{!! $mem->userdetails->first." ".$mem->userdetails->last!!}</span>
                        </a>
                            @endforeach
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    @endif
        </div>
=======
        @endif
    </div>
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
@endsection
