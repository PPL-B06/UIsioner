<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="UIsioner is a web app that helps students to get data.">
    <meta name="author" content="PPL-B06">
	<title>UIsioner @yield('page-title')</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ url('/resources/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ url('/resources/assets/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
    <!-- Normalize.css makes browsers render all elements more consistently and in line with modern standards -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css" rel="stylesheet" >
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

    <link rel="icon" href="resources/assets/images/logo/logo.png">

    <link href='https://fonts.googleapis.com/css?family=Cabin:600|Catamaran:700' rel='stylesheet' type='text/css'>
	
	<style>
		@media screen and (min-width: 767px) {
		    #mobile-nav {
		        display: none;
		    }
		}

		@media screen and (max-width: 767px) {
		    #desktop-nav {
		        display: none;
		    }

		    #button-text {
		    	display: none;
		    }
		}
	</style>

	@yield('custom-styles')

</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ url('home') }}">UIsioner</a>
				<div id="mobile-nav" class="container pull-right">
					@include('nav-buttons')	
				</div>
				<button hidden type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="glyphicon glyphicon-th-list"></span>                        
				</button>
			</div>

			<div id="desktop-nav" class="navbar-collapse">
				<div class="pull-right">
					@include('nav-buttons')
				</div>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar" hidden>

				<ul class="nav navbar-nav navbar-right" hidden>
					<li id="coins" data-toggle="modal" data-target="#exampleModal"><a href="#"><i class="fa fa-database fa-lg fa-fw" aria-hidden="true"></i> {{DB::table('users')->where('NPM','=',session()->get('npm'))->first()->coin}}</a></li>
				</ul>

			</div>
		</div>
	</nav>
	
	<!-- ini awal modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">My Coin</h4>
				</div>
				<div class="modal-body">
					<div class="tabbable"> <!-- Only required for left/right tabs -->
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Add / Coin Redeem</a></li>
							<li><a href="#tab2" data-toggle="tab">Request Log</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form>
									<div class="input-group input-group-lg">
									<!-- <label for="my-coin">Coin anda</label> -->
									<span class="input-group-addon" id="sizing-addon1">Rp</span>
									<input type="text" class="form-control" placeholder="{{DB::table('users')->where('NPM','=',session()->get('npm'))->first()->coin}}" aria-describedby="sizing-addon1" readonly="">
									</div>
								</form>

								<form>
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1">Rp</span>
										<input type="text" class="form-control" name="qnumber" placeholder="xxx" aria-describedby="sizing-addon1" pattern="^[0-9]{1,11}$" required>
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" formaction="{{ url('/add-coin') }}">Add</button>
										<button type="submit" class="btn btn-primary" formaction="{{ url('/redeem-coin') }}">Redeem</button>
									</div>
								</form>
								
							</div>
							<div class="tab-pane" id="tab2">
								<table class="table table-striped">
									<thead>
									  <tr>
										<th>Date Requested</th>
										<th>Type</th>
										<th>Number</th>
										<th>Status</th>
									  </tr>
									</thead>
									<tbody>
									<?php $coinreqs2 = DB::table('coin_request')->where('NPM','=',session()->get('npm'))->get(); ?>
									
									@foreach ($coinreqs2 as $coinreq)
									  <tr>
										<td>{{$coinreq->Time_Stamp}}</td>
										<td>{{$coinreq->type}}</td>
										<td>{{$coinreq->QNumber}}</td>
										<td>
										@if($coinreq->status==null)
										{{'not approved'}}
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
				
					

				</div>
			</div>
		</div>
	</div>
    <!-- ini akhir modal -->
	
	@yield('content')

	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy; 2016 PPL-B06</p>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ url('/resources/assets/js/bootstrap.min.js') }}"></script>
	@yield('custom-scripts')
</body>
</html>