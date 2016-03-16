<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">
  <script src="{{ url('/vendor/phpunit/php-code-coverage/src/CodeCoverage/Report/HTML/Renderer/Template/js/jquery.min.js') }}"></script>
  <script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">UIsioner</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="#">Create Form</a></li>
        <li><a href="#">My Form</a></li>
        <li><a href="#">My Responses</a></li>
        <li><a href="#">&copy; 50</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->
    </div>
    <div class="col-sm-8 text-left" style="margin-bottom:20px;"> 
      <h3>Most Recent Form</h3>
	  <hr>
	  <div class="row">
		  <div class="col-xs-2">
		  <img src="{{ url('/assets/images/foto.jpg') }}" class="img-responsive">
		  </div>
		  <div class="col-xs-10">
		  <h4>Judul Form 1</h4>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		  <p>Filled Form : Z/50</p>
		  <p>Number of Questions : XX</p>
		  <p>Rewards : Y Coins</p>
		  <button class="btn btn-default pull-right">Fill Form</button>
		  </div>
	  </div>
	  <hr>
      <div class="row">
		  <div class="col-xs-2">
		  <img src="images/foto.jpg" class="img-responsive">
		  </div>
		  <div class="col-xs-10">
		  <h4>Judul Form 2</h4>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		  <p>Filled Form : Z/50</p>
		  <p>Number of Questions : XX</p>
		  <p>Rewards : Y Coins</p>
		  <button class="btn btn-default pull-right">Fill Form</button>
		  </div>
	  </div>
	  <hr>
	  <div class="row">
		  <div class="col-xs-2">
		  <img src="images/foto.jpg" class="img-responsive">
		  </div>
		  <div class="col-xs-10">
		  <h4>Judul Form 3</h4>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		  <p>Filled Form : Z/50</p>
		  <p>Number of Questions : XX</p>
		  <p>Rewards : Y Coins</p>
		  <button class="btn btn-default pull-right">Fill Form</button>
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

<footer class="container-fluid text-center">
  <p>&copy; PPL-B06 2016</p>
</footer>

</body>
</html>
