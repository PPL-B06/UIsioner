@extends('layout')

@section('page-title') {{ " | My responses" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('content')
<div class="container">
	<div class="row content">

    <div class="col-sm-2 sidenav hidden-xs"></div>

    <div class="col-sm-8 text-left" style="margin-bottom:20px;">
      <h4 class="text-uppercase title">My Responses</h4>
      <div class="panel panel-default">
        <div class="panel-body">
            @foreach($resp_forms as $resp_form)
            <div class="row">
            <div class="col-xs-12">
              <h4>{{ $resp_form->Title }} <br/><small>filled on {{ date('l, F jS Y', strtotime($resp_form->Time_Stamp)) }}</small></h4>
            </div>
            @endforeach
            </div>
        </div>
      </div>
      
      
    </div>

    <div class="col-sm-2 sidenav"></div>
	</div>
</div>
@stop

@section('custom-scripts')
<script>
    $(document).ready(function(){
      $('li').removeClass('active');
      $('#my-responses').addClass('active');
    });
</script>
@stop