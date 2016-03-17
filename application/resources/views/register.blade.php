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

<div class="container">
    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label">Handphone</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="Handphone" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Register
                            </button>
                        </div>

                    </div>
                 </form>
                </div>
            </div>
        </div>
     
    </div>
</div>


<footer class="container-fluid text-center">
  <p>&copy; PPL-B06 2016</p>
</footer>

</body>
</html>
