@extends('layouts.scrolling')

@section('content')
    <div class="container">
        <img src="/images/profilepic.png">
        {{ URL::to('/') }}/images/profilepic.png
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="panel-heading">
                Details
            </div>
            <div class="panel-body">
                <ul class="list-group-item">
                    <li class="list-group-item">
                        <strong>First Name</strong>
                        <span class="label label-success pull-right">
                            Cheng
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Last Name</strong>
                        <span class="label label-success pull-right">
                            Jiang
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default col-md-5 col-xs-5">
        <div class="panel-heading">
            Event Timeline
        </div>
    </div>
    @endsection