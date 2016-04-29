@extends('layout')

@section('page-title') {{ "| FAQ" }} @stop

@section('custom-styles')
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

        <link rel="icon" href="resources/assets/images/logo/logo.png">

        <link rel="stylesheet" href="{{ url('/resources/assets/css/cover-page.css') }}">

    </head>
@stop

@section('content')
<div class="container">
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
	                <li class="active"><a href="#">Home</a></li>
	                <li><a href="faq">FAQ</a></li>
	            </ul>
	        </div>
	    </div>
	</nav>    
	<div class="row" style="margin-top:80px">
  
	    <div class="col-sm-2 sidenav hidden-xs">

	    </div>
	  
	    <div class="col-sm-8 text-center" style="margin-bottom:20px;"> 
	    	<div class="panel panel-default">
		    	<div class="panel-body">
		     		<h3>F.A.Q</h3>

		     		<div class="text-left">
						<h4>What you should know: </h4>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								 <img src="resources/assets/images/icon/coin.png" class="img-responsive center-block" width="65%" >
								 </br>
								 <p class="text-justify">1 coin = Rp. 1000,- (credit)</p>

							</div>
							<div class="col-md-4"></div>
						</div>

						<h4>How to buy coins: </h4>
						<div class="row">
							<div class="col-md-4">
								 <img src="resources/assets/images/icon/bank.png" class="img-responsive center-block" width="65%" >
								 </br>
								 <p class="text-justify">1. Transfer the amount that you want to our bank account : 1233211234 (a/n UIsioner)</p>

							</div>
							<div class="col-md-4">
								<img src="resources/assets/images/icon/email.png" class="img-responsive center-block" width="65%" >
								</br>
								 <p class="text-justify">2. Send e-mail contains your name, NPM, and the amount you transfer along with the picture of proof to UIsioner@gmail.com </p>

							</div>
							<div class="col-md-4">
								<img src="resources/assets/images/icon/add.png" class="img-responsive center-block" width="65%" >
								</br>
								 <p class="text-justify">3. Fill the amount you transfered in the coin page and click the "add" button, Our people will confirm your payment :)</p>

							</div>
						</div>

						<h4>How to use your coins: </h4>
						<div class="row">
							<div class="col-md-6">
								 <img src="resources/assets/images/icon/questionnaire.png" class="img-responsive center-block" width="50%" >
								 </br>
								 <p class="text-center">Make a questionnaire</p>

							</div>
							<div class="col-md-6">
								<img src="resources/assets/images/icon/credit.png" class="img-responsive center-block" width="50%" >
								</br>
								 <p class="text-center">Exchange with phone credit</p>

							</div>
						</div>

						<h4>How to exchange your coins with credit: </h4>
						<div class="row">
							<div class="col-md-6">
								 <img src="resources/assets/images/icon/redeem.png" class="img-responsive center-block" width="50%" >
								 </br>
								 <p class="text-justify">1. Fill the amount you want to redeem in the coin page and click the "redeem" button</p>

							</div>
							<div class="col-md-6">
								<img src="resources/assets/images/icon/receive.png" class="img-responsive center-block" width="50%" >
								</br>
								 <p class="text-justify">2. Our people will send the credit to your phone number</p>
							</div>
						</div>
					</div>
		     	</div>
			</div>
     	</div>

	    <div class="col-sm-2 sidenav">
	      
	    </div>
  	</div>
	
</div>
@stop