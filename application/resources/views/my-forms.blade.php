@extends('layout')

@section('page-title') {{ "| My forms" }} @stop

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
      <h4 class="text-uppercase title">My Forms</h4>
      <div class="panel panel-default">
        <div class="panel-body">
          <!--Membuat list form sesuai form yang ada di database-->
          @foreach ($forms as $form)
            <div class="row">
              <!-- <div class="col-xs-2">
              <img src="{{ url('/resources/assets/images/foto.jpg') }}" class="img-responsive">
              </div> -->
              <div class="col-xs-12">
              <h4>{{ $form->Title }}</h4>
              <p>{{ $form->Description }}</p>
              <p>Filled Form: {{ $form->FilledNumber }}/{{ $form->TargetNumber }}</p>
              <p>Number of Questions: {{ $form->QNumber }}</p>
              <p>Rewards: {{ $form->Reward }} Coins</p>
              <a href="{{ url('/view-form',['formID'=>$form->ID]) }}"><button class="btn btn-default animate pull-right " style="margin-left: 20px">View Form</button></a>
              <a href="{{ url('/result',['formID'=>$form->ID]) }}"><button class="btn btn-default animate pull-right ">See Result</button></a>
              </div>
            </div>
            <hr>
          @endforeach
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

@section('custom-scripts')
<script>
    $(document).ready(function(){
      $('li').removeClass('active');
      $('#my-forms').addClass('active');
    });
</script>
@stop