@extends('layout')

@section('page-title') {{ "| Home" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('navbar')
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <a class="navbar-brand" href="home">UIsioner</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Create Form</a></li>
        <li><a href="#">My Form</a></li>
        <li><a href="#">My Responses</a></li>
        <li><a href="#">&copy; 50</a></li>
        <li class=""><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
@stop

@section('content')
<div class="container text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->
    </div>
    <div class="col-sm-8 text-left" style="margin-bottom:20px;"> 
      <h3>Most Recent Form</h3>
    <hr>
    <div class="row">
      <div class="col-xs-2">
      <img src="{{ url('/resources/assets/images/foto.jpg') }}" class="img-responsive">
      </div>
      <div class="col-xs-10">
      <h4>Judul Form 1</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <p>Filled Form : Z/50</p>
      <p>Number of Questions : XX</p>
      <p>Rewards : Y Coins</p>
      <button class="btn btn-default pull-right">Fill Form</button>
      </div>
    </div>
    <hr>
      <div class="row">
      <div class="col-xs-2">
      <img src="{{ url('/resources/assets/images/foto.jpg') }}" class="img-responsive">
      </div>
      <div class="col-xs-10">
      <h4>Judul Form 2</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <p>Filled Form : Z/50</p>
      <p>Number of Questions : XX</p>
      <p>Rewards : Y Coins</p>
      <button class="btn btn-default pull-right">Fill Form</button>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-2">
      <img src="{{ url('/resources/assets/images/foto.jpg') }}" class="img-responsive">
      </div>
      <div class="col-xs-10">
      <h4>Judul Form 3</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <p>Filled Form : Z/50</p>
      <p>Number of Questions : XX</p>
      <p>Rewards : Y Coins</p>
      <button class="btn btn-default pull-right">Fill Form</button>
      </div>
    </div>
    
    </div>
    <div class="col-sm-2 sidenav">
      <!--<div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>-->
    </div>
  </div>
</div>
@stop

@section('footer')
<footer class="footer">
  <div class="container">
    <p class="text-muted">&copy; 2016 PPL-B06</p>
  </div>
</footer>
@stop