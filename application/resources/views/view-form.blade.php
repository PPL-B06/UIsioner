@extends('layout')

@section('page-title') {{ "| Home" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
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
      <h3>View Form</h3>
    <hr>
	<form role="form" method="POST" action="{{ url('/postAnswer') }}">
  	@foreach ($questions as $question)
    <label class="control-label" for="title">{{$question->Title}}</label>
    <input type="text" name="{{ $question->ID }}" class="form-control" pattern="([\32-\x7E]){1,127}$" required disabled>
    <hr>

	@endforeach
  <input type="text" name="formID" value="{{ $formID }}" hidden>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-default animate pull-right" disabled>Submit</button>
    </div>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
    
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