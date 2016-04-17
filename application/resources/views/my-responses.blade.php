@extends('layout')

@section('page-title') {{ " | My Responses" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('content')
<div class="container">
	<div class="row content">

    <div class="col-sm-2 sidenav hidden-xs"></div>

    <div class="col-sm-8 text-left">
      <div class="panel panel-default">
        <ul class="list-group">
          @foreach($resp_forms as $resp_form)
          <li class="list-group-item">
            <h4>{{ $resp_form->Title }} <small>Filled on {{ date('l, F jS Y', strtotime($resp_form->Time_Stamp)) }}</small></h4>
          </li>
          @endforeach
        </ul>
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