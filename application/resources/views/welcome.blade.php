@extends('layout-landing')

@section('active')
<li class="active"><a href="#">Home</a></li>
<li><a href="faq">FAQ</a></li>  
@stop

@section('content') 
    <div class="inner cover">
        <img src="resources/assets/images/logo/logo_H.png" class="img-responsive center-block" margin-left="188 px" alt="UIsioner" max-width="50%">

        <h2 class="cover-heading">Gathering data has never been this fun.
        </br>
        <small class="lead">UIsioner is a place for UI students to create questionnaire and collect data easily. <br/>Create forms and get data, or fill forms and get rewards. It's up to you.</small></h2>
        <small class="lead">
            <a href="login" class="btn btn-lg btn-default animate">Login with SSO UI</a>
        </small>
    </div>
@stop
