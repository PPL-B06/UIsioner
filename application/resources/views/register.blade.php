@extends('layout-register')

@section('page-title') {{ "| Register" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('content')
<div class="container">
    <div class="row">
     <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Complete your data</div>
        <div class="panel-body">
         <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {!! csrf_field() !!} 
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">E-Mail</label>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" value="{{ old('email') }}"> 
              @if ($errors->has('email')) 
              <span class="help-block"> 
                <strong>{{ $errors->first('email') }}</strong> 
              </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Handphone</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"> 
              @if ($errors->has('phone')) 
              <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
              </span> 
              @endif 
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary btn-block right">
                <i class="fa fa-btn fa-user"></i>Register
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