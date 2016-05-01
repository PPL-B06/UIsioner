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

    <link rel="stylesheet" href="{{ url('/resources/assets/css/cover-page.css') }}">
	@yield('custom-styles')

</head>
<body>
	<div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
				<nav class="navbar navbar-default navbar-fixed-top">
			        <div class="container-fluid">
			            <div class="navbar-header"> 
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>                        
			                </button>      
			                <a class="masthead-brand" href="#">
			                    <img src="resources/assets/images/logo/uisioner-logo.png" class="img-responsive navbar-left" alt="UIsioner">
			                </a>
			               
			            </div>
			            <div class="collapse navbar-collapse" id="myNavbar">
			                <ul class="nav masthead-nav ">
			               		@yield('active')
			                    
			                </ul>
			            </div>
			        </div>
			    </nav>

				@yield('content')
        	 </div>
        </div>
    </div>
	 <div class="mastfoot">
        <div class="inner">
            <p>&copy; 2016 PPL-B06</p>
        </div>
    </div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ url('/resources/assets/js/bootstrap.min.js') }}"></script>
	@yield('custom-scripts')
</body>
</html>

