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
      <h5 class="text-uppercase">Most Recent Form</h5>
      <!--Membuat list form sesuai form yang ada di database-->
      @foreach ($forms as $form)
      <div class="panel panel-default">
        <div class="panel-body">
          
          <h4>{{ $form->Title }} <small>by {{ DB::table('users')->select('name')->where('NPM','=',$form->NPM)->first()->name }}</small></h4>

          <div class="row">
            <div class="col-xs-12">
              <h4><span class="label label-default">{{ $form->FilledNumber }} of {{ $form->TargetNumber }} form filled</span> <span class="label label-default">{{ $form->QNumber }} questions</span> <span class="label label-default">{{ $form->Reward }} Coins</span></h4>
            </div>
          </div>

          <p id="description" style="font-size: 10pt">
          @if(strlen($form->Description) > 50)
          {{ substr($form->Description, 0, -strlen($form->Description)/1.3) . "..." }}<a href="">read more</a>
          @else
          {{ $form->Description }}
          @endif
          </p>

          @if ($form->FilledNumber >= $form->TargetNumber)
          <button class="btn btn-primary pull-right disabled">Completed</button>
          @elseif (in_array($form->form_ID, $terisi))
          <button class="btn btn-success pull-right disabled"><i class="fa fa-check" aria-hidden="true"></i> Filled</button>
          @else
          <a href="{{ url('/fillform',['formID'=>$form->form_ID]) }}"><button class="btn btn-primary pull-right ">Fill form</button></a>
          @endif  
        </div>
      </div>
      @endforeach
    </div>

    <div class="col-sm-2 sidenav">
      
    </div>
  </div>
</div>
@stop