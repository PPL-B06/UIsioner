<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="UIsioner is a web app that helps students to get data.">
        <meta name="author" content="PPL-B06">
        <title>UIsioner</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ url('/resources/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="{{ url('/resources/assets/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
        <!-- Normalize.css makes browsers render all elements more consistently and in line with modern standards -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css" rel="stylesheet" >

        <Link rel="icon" href="logo/logo.png">

        <link href='https://fonts.googleapis.com/css?family=Cabin:600|Catamaran:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ url('/resources/assets/css/cover-page.css') }}">

    </head>
    
    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">

                    <div class="masthead clearfix">
                        <div class="inner">
                            <h3 class="masthead-brand">UIsioner</h3>
                            <nav>
                                <ul class="nav masthead-nav">
                                    <li class="active"><a href="#">Home</a></li>
                                    <li><a href="faq">FAQ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="inner cover">
                        <img src="logo/logo_H.png" class="img-responsive center-block" margin-left="188 px" alt="UIsioner" width="50%">

                        <h1 class="cover-heading">Gathering data has never been this fun.</h1>
                        <p class="lead">UIsioner is a place for UI students to create questionnaire and collect data easily. Create forms and get data, or fill forms and get rewards. It's up to you.</p>
                        <p class="lead">
                            <a href="login" class="btn btn-lg btn-default">Login with SSO UI</a>
                        </p>
                    </div>

                    <div class="mastfoot">
                        <div class="inner">
                            <p>&copy; 2016 PPL-B06</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ url('/resources/assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>