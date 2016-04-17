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

    <link rel="icon" href="logo/logo.png">

    <link href='https://fonts.googleapis.com/css?family=Cabin:600|Catamaran:700' rel='stylesheet' type='text/css'>
	@yield('custom-styles')

</head>
<body>

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
			<ul class="nav navbar-nav"></ul>
			<ul class="nav navbar-nav navbar-right">
				<li id="create-form"><a href="createform"><i class="fa fa-plus" aria-hidden="true"></i> Create Form</a></li>
				<li id="my-forms"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> My Forms</a></li>
				<li id="my-responses"><a href="my-responses"><i class="fa fa-paper-plane" aria-hidden="true"></i> My Responses</a></li>
				<li id="coins"><a href="#"><i class="fa fa-database" aria-hidden="true"></i> 50</a></li>
				<li id="logout"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
			</div>
		</div>
	</nav>
	
	@yield('content')

	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy; 2016 PPL-B06</p>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ url('/resources/assets/js/bootstrap.min.js') }}"></script>
	@yield('custom-scripts')
</body>
</html>