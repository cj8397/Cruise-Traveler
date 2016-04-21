@extends('layouts.scrolling')

@section('content')

<!-- Intro Section -->
    <div class="container-fluid">
        <div class="row col-xs-12 col-md-12">
            <div class="col-md-5 col-md-offset-1 col-xs-5 col-xs-offset-1">
                <iframe
                        src="https://www.youtube.com/embed/CnAUfvWlBGs"
                        frameborder="2" allowfullscreen></iframe>
            </div>
            <div class="col-md-5 col-md-offset-1 col-xs-5 col-xs-offset-1">
                <button type="button" class="btn btn-primary col-md-5 col-xs-5"> Login! </button>
            </div>
            <div class="col-md-5 col-md-offset-1 col-xs-5 col-xs-offset-1">
                <button type="button" class="btn btn-primary col-md-5 col-xs-5"> Register! </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1>Scrolling Nav</h1>
                <p><strong>Usage Instructions:</strong> Make sure to include the <code>scrolling-nav.js</code>, <code>jquery.easing.min.js</code>, and <code>scrolling-nav.css</code> files. To make a link smooth scroll to another section on the page, give the link the <code>.page-scroll</code> class and set the link target to a corresponding ID on the page.</p>
                <a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a>
            </div>

        </div>
    </div>


{{--<!-- Contact Section -->--}}
{{--<section id="contact" class="contact-section">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<h1>Contact Section</h1>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
@endsection