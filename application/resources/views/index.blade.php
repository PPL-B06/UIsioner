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
      <h3>Most Recent Form</h3>
      <!--Membuat list form sesuai form yang ada di database-->
      {{--var_dump($terisi)--}}
      {{--dd($forms)--}}
      {{--session()->get('npm')--}}

      
      <div class="panel panel-default">
        <ul class="list-group">
          @foreach ($forms as $form)
          <li class="list-group-item">
            <h4>{{ $form->Title }}</h4>
            <p>{{ $form->Description }}</p>
            <p>Filled Form: {{ $form->FilledNumber }}/{{ $form->TargetNumber }}</p>
            <p>Number of Questions: {{ $form->QNumber }}</p>
            <p>Rewards: {{ $form->Reward }} Coins</p>
            
            @if ($form->FilledNumber >= $form->TargetNumber)
            <button class="btn btn-primary pull-right disabled">Completed Form</button>
            @elseif (in_array($form->form_ID, $terisi))
            <button class="btn btn-primary pull-right disabled">Filled Form</button>
            @else
            <a href="{{ url('/fillform',['formID'=>$form->form_ID]) }}"><button class="btn btn-primary pull-right ">Fill Form</button></a>
            @endif  
          </li>
          @endforeach
        </ul>
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