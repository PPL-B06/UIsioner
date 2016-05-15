@extends('layout')

@section('page-title') {{ "| Home" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('content')
<div class="container">    
  <div class="row content">
  
    <div class="col-sm-2 sidenav hidden-xs">

    </div>
  
    <div class="col-sm-8 text-left" style="margin-bottom:20px;"> 

      @if ($alert = Session::get('alert'))
        <div class="alert alert-warning">
          {{ $alert }}
        </div>
      @endif
      @if ($alert = Session::get('alert-success'))
        <div class="alert alert-success">
          {{ $alert }}
        </div>
      @endif
      <h4 class="text-uppercase title" >Most Recent Form</h4>
      <!--Membuat list form sesuai form yang ada di database-->
      @foreach ($forms as $form)
      <div class="panel panel-default">
        <div class="panel-body">
          
          <h4>{{ $form->Title }} 
          <br/><small>by {{ DB::table('users')->select('name')->where('NPM','=',$form->NPM)->first()->name }}</small></h4>

          <div class="row">
            
            <div class="col-md-8">
              <p id="description" style="font-size: 10pt">
              @if(strlen($form->Description) > 50)
              {{ substr($form->Description, 0, -strlen($form->Description)/2) . "..." }}<a href="">read more</a>
              @else
              {{ $form->Description }}
              @endif
              </p>    
            </div>

            <div class="col-md-4">
              <ul class="list-group text">
                <li class="list-group-item">
                  <span class="badge ">{{ $form->FilledNumber }} of {{ $form->TargetNumber }}</span>
                  Form filled
                </li>
                <li class="list-group-item">
                  <span class="badge">{{ $form->QNumber }}</span>
                  Questions
                </li>
                <li class="list-group-item">
                  <span class="badge">{{ $form->Reward }}</span>
                  Rewards
                </li>
              </ul>
            </div>
          </div>

          @if ($form->FilledNumber >= $form->TargetNumber)
          <button class="btn btn-default animate btn-sm pull-right disabled"><i class="fa fa-check" aria-hidden="true"></i> Completed</button>
          @elseif (in_array($form->form_ID, $terisi))
          <button class="btn btn-default animate btn-sm pull-right disabled"><i class="fa fa-check" aria-hidden="true"></i> Filled</button>
          @else
          <a href="{{ url('/fill-form',['formID'=>$form->form_ID]) }}"><button class="btn btn-default animate btn-sm pull-right "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Fill form</button></a>
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