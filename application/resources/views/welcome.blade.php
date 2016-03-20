@extends('layout')

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/cover-page.css') }}">
@stop

@section('content')
<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

        <div class="masthead clearfix">
            <div class="inner">
                <h3 class="masthead-brand">UIsioner</h3>
                <nav>
                    <ul class="nav masthead-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="faq">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="inner cover">
            <h1 class="cover-heading">Gathering data has never been this fun.</h1>
            <p class="lead">UIsioner is a place for UI students to create questionnaire and collect data easily. Create forms and get data, or fill forms and get rewards. It's up to you.</p>
            <p class="lead">
                <a href="login" class="btn btn-lg btn-default">Login with SSO UI</a>
            </p>
        </div>

        <div class="mastfoot">
            <div class="inner">
                <p>&copy; 2016 PPL-B06</p>
            </div>
        </div>

        </div>

    </div>

</div>
@stop