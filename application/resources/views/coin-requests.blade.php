@extends('layout')

@section('page-title') {{ "| Coin Requests" }} @stop

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
    	@if ($alert = Session::get('alert-success'))
        	<div class="alert alert-success">
          	{{ $alert }}
        	</div>
      	@endif
		<h4 class="text-uppercase title">Requests Log</h4>
		
		<div class="panel panel-default">
			<div class="panel-body table-responsive">
				<table class="table table-striped text">
					<thead>
					  <tr>
						<th>Date Requested</th>
						<th>Type</th>
						<th>Number</th>
						<th>Status</th>
					  </tr>
					</thead>
					<tbody>
					{{-- requests adalah kumpulan data request yang telah dilakukan oleh semua user --}}
					{{-- disini menampilkan detil tiap request user --}}
					@foreach ($requests as $request)
					  <tr>
						<td>{{$request->Time_Stamp}}</td>
						<td>{{$request->type}}</td>
						<td>{{$request->QNumber}}</td>
						<td>
						@if($request->status==null)
						<a href="{{ url('/approve-req',['reqID'=>$request->ID]) }}"><button class="btn btn-default btn-xs animate">Approve</button></a>
						@else
						{{'approved'}}
						@endif
						</td>
					  </tr>
					  @endforeach
					  
					</tbody>
			    </table>
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
      $('#coin-requests').addClass('active');
    });
</script>
@stop