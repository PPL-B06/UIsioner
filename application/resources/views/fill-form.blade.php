@extends('layout')

@section('page-title') {{ "| Fill form" }} @stop

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
      <h4 class="text-uppercase">Fill Form</h4>
    	<div class="panel panel-default">
        <div class="panel-body">
          <form role="form" method="POST" action="{{ url('/post-answer') }}">
            @foreach ($questions as $question)
            <label class="control-label txtMont" for="title">{{$question->Title}}</label>
            <input type="text" name="{{ $question->ID }}" class="form-control" pattern="([\32-\x7E]){1,127}$" required>
            <hr>
            @endforeach
            <input type="text" name="formID" value="{{ $formID }}" hidden>
            <div class="form-group">
                <button type="submit" class="btn btn-default animate pull-right">Submit</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>  
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