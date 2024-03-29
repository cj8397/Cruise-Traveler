@extends('layouts.scrolling')
@section('styles')
    <style>

        .profile{
            padding: 5px;
        }
        .img-wrapper > img{
            width:100%;
            top:-15%;
        }
    </style>
    @endsection
@section('content')
        <div class="img-wrapper">
            <img class="img-responsive" src="/images/cruise_event.PNG" alt="">
        </div>
            <div class="col-sm-4 col-xs-12 text-center">
                <div class="panel panel-default">
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
                        @if(isset($members) && isset($currentUser))
                            <div class="row col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel panel-heading">Participants</div>
                                    <div class="panel panel-body">
                                        <div class="row">
                                            @foreach ($members as $mem)
                                                <a class="col-xs-4 col-md-3 profile" href="/users/userprofile/{!! $mem->user_id !!}">
                                                    <img class="img-responsive img-circle" src="/images/profilepic.png" alt="">
                                                    <span class="label label-default label-pill">{!! $mem->userdetails->first !!}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                @if(!empty($thread) && isset($currentUser))
                    <div class="col-xs-12">
                        <div class="row panel panel-default">
                            <h2 class="panel-heading"> Message Board </h2>
                            <div class="panel-body">
                                <div class="col-xs-4">
                                    {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                                            <!-- Message Form Input -->
                                    <div class="form-group clearfix">
                                        {!! Form::textarea('message', null, ['class' => 'col-xs-9', 'placeholder' => 'Send a message...']) !!}
                                    </div>
                                    <div class="form-group clearfix">
                                        {!! Form::submit('Send', ['class' => 'btn btn-primary col-xs-12']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-xs-8">
                                    @foreach($thread->messages as $message)
                                        <div class="col-xs-12 message">
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
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($members) && !isset($currentUser))
                    <div class="row col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel panel-heading">Participants</div>
                            <div class="panel panel-body">
                                <div class="row">
                                    @foreach ($members as $mem)
                                        <a class="col-xs-4 col-sm-4 col-md-2 profile" href="/users/userprofile/{!! $mem->user_id !!}">
                                            <img class="img-responsive img-circle" src="/images/profilepic.png" alt="">
                                            <span class="label label-default label-pill">{!! $mem->userdetails->first." ".$mem->userdetails->last!!}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
@endsection
