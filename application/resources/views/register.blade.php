@extends('layout-landing')

@section('page-title') {{ "| Register" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('active')
<li><a href="#">Home</a></li>
<li><a href="faq">FAQ</a></li>  
@stop

@section('content')
<div class="container">
    <div class="row">
     <div class="col-md-6 col-xs-8 col-xs-offset-2 col-md-offset-3">
      <div class="panel panel-default reg">
        <div class="panel-title">
        <h1 class="text-center">Complete your profile
        <img src="resources/assets/images/logo/logo.png" class="img-responsive center-block" width="10%">
        </h1>
        </div>
        <div class="panel-body">
         
         <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {!! csrf_field() !!} 
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-10 col-xs-10 col-xs-offset-1">
              <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="{{ old('email') }}"> 
            </div>
          </div>

          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <div class="col-md-10 col-xs-10 col-xs-offset-1">
              <input type="text" class="form-control input-lg" name="phone" placeholder="Handphone Number" value="{{ old('phone') }}"> 
              
            </div>
          </div>

          <div class="form-group">
             <div class="col-md-10 col-xs-10 col-xs-offset-1">

                @if ($errors->has('email')) 
                  <span class="help-block"><strong class="warning">This data is required</strong></span>
                @else
                  @if ($errors->has('phone')) 
                  <span class="help-block">
                    <strong class="warning">{{ $errors->first('phone') }}</strong>
                  </span> 
                  @endif 

                @endif
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-10 col-xs-10 col-xs-offset-1">
              <button type="submit" class="btn btn-lg btn-default btn-block center animate">Register
              </button>
            </div>
          </div>

          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </form>

      </div>
    </div>
  </div>
  
</div>
</div>
@stop