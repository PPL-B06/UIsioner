@extends('layout-landing')

@section('page-title') {{ "| FAQ" }} @stop

@section('active')
<li><a href="welcome">Home</a></li>
<li class="active"><a href="#">FAQ</a></li>  
@stop

@section('content')

<!-- Halaman yang menampilkan informasi mengenai coin pada UIsioner -->
<div class="row" style="margin-top:80px">

    <div class="col-sm-2 sidenav hidden-xs">
	</div>
  
    <div class="col-sm-8 text-center" style="margin-bottom:40px;"> 
    	<div class="panel panel-default">
	    	<div class="panel-title">
	     		<h1>F.A.Q</h1>
	     	</div>
			<div class="panel-body">
	     		<div class="text-left">
					<h4 class="title">What you should know: </h4>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							 <img src="resources/assets/images/icon/coin.png" class="img-responsive center-block icon3">
							 </br>
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3">
							 <p class="text-center text"><strong>Buy coins:</strong>
							  </br> Rp. 1000,- = 1 coin</p>
						</div>
						<div class="col-md-3">
							 <p class="text-center text"><strong>Exchange coins:</strong> 
							  </br>1 coin = Rp. 800,- (phone credit)</p>
						</div>
						<div class="col-md-3"></div>
					</div>

					<h4 class="title">How to buy coins: </h4>
					<div class="row">
						<div class="col-md-4">
							 <img src="resources/assets/images/icon/bank.png" class="img-responsive center-block icon">
							 </br>
							 <p class="text-justify text">1. Transfer the amount that you want to our bank account : 1233211234 (a/n UIsioner)</p>

						</div>
						<div class="col-md-4">
							<img src="resources/assets/images/icon/email.png" class="img-responsive center-block icon">
							</br>
							 <p class="text-justify text">2. Send e-mail contains your name, NPM, and the amount you transfer along with the picture of proof to UIsioner@gmail.com </p>

						</div>
						<div class="col-md-4">
							<img src="resources/assets/images/icon/add.png" class="img-responsive center-block icon">
							</br>
							 <p class="text-justify text">3. Fill the amount you transfered in the coin page and click the "add" button, Our people will confirm your payment :)</p>

						</div>
					</div>

					<h4 class="title">How to use your coins: </h4>
					<div class="row">
						<div class="col-md-6">
							 <img src="resources/assets/images/icon/questionnaire.png" class="img-responsive center-block icon2">
							 </br>
							 <p class="text-center text"><strong>Make a questionnaire</strong></p>

						</div>
						<div class="col-md-6">
							<img src="resources/assets/images/icon/credit.png" class="img-responsive center-block icon2">
							</br>
							 <p class="text-center text"><strong>Exchange with phone credit</strong></p>

						</div>
					</div>

					<h4 class="title">How to exchange your coins with credit: </h4>
					<div class="row">
						<div class="col-md-6">
							 <img src="resources/assets/images/icon/redeem.png" class="img-responsive center-block icon2">
							 </br>
							 <p class="text-justify text">1. Fill the amount you want to redeem in the coin page and click the "redeem" button</p>

						</div>
						<div class="col-md-6">
							<img src="resources/assets/images/icon/receive.png" class="img-responsive center-block icon2">
							</br>
							 <p class="text-justify text">2. Our people will send the credit to your phone number</p>
						</div>
					</div>
				</div>
	     	</div>
		</div>
 	</div>

    <div class="col-sm-2 sidenav">
      
    </div>
</div>

@stop