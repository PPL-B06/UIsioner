@extends('layout')

@section('page-title') {{ "| Home" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('navbar')
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <a class="navbar-brand" href="home">UIsioner</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="createform">Create Form</a></li>
        <li><a href="#">My Form</a></li>
        <li><a href="my-responses">My Responses</a></li>
        <li><a href="#">&copy; 50</a></li>
        <li class=""><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
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
    <hr>
	<!--Membuat list form sesuai form yang ada di database-->
	{{--var_dump($terisi)--}}
	{{--dd($forms)--}}
	{{--session()->get('npm')--}}
	
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
	  @if ($form->FilledNumber >= $form->TargetNumber)
	  <button class="btn btn-primary pull-right disabled">Completed Form</button>
	  @elseif (in_array($form->form_ID, $terisi))
	  <button class="btn btn-primary pull-right disabled">Filled Form</button>
	  @else
      <a href="{{ url('/fillform',['formID'=>$form->form_ID]) }}"><button class="btn btn-primary pull-right ">Fill Form</button></a>
	  @endif
      </div>
    </div>
    <hr>
	@endforeach
    </div>
    <div class="col-sm-2 sidenav">
      <!-- ini awal modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add & Redeem Coin</button>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Add & Redeem Coin</h4>
            </div>
            <div class="modal-body">
              <form>
                Coin anda
                <div class="input-group input-group-lg">
                  <!-- <label for="my-coin">Coin anda</label> -->
                  <span class="input-group-addon" id="sizing-addon1">Rp</span>
                  <input type="text" class="form-control" placeholder="50" aria-describedby="sizing-addon1" readonly="">
                </div>
              </form>

              <form>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1">Rp</span>
                  <input type="text" class="form-control" name="qnumber" placeholder="xxx" aria-describedby="sizing-addon1" pattern="^[0-9]{1,11}$" required>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" formaction="{{ url('/addcoin') }}">add</button>
                  <button type="submit" class="btn btn-primary" formaction="{{ url('/redeemcoin') }}">redeem</button>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- ini akhir modal -->
    </div>
  </div>
</div>
@stop

@section('footer')
<footer class="footer">
  <div class="container">
    <p class="text-muted">&copy; 2016 PPL-B06</p>
  </div>
</footer>
@stop