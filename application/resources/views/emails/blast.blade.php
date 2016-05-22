<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="UIsioner is a web app that helps students to get data.">
    <meta name="author" content="PPL-B06">
	<title>UIsioner | email</title>

	<!-- Bootstrap core CSS -->
	<link href="https://04617a0df94285d09abebd5a8e5835aac1e8c013.googledrive.com/host/0B_gfdy0sVQGrU0R1c3dLdkFzbFE/bootstrap.min.css" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://04617a0df94285d09abebd5a8e5835aac1e8c013.googledrive.com/host/0B_gfdy0sVQGrU0R1c3dLdkFzbFE/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Normalize.css makes browsers render all elements more consistently and in line with modern standards -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css" rel="stylesheet" >
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

    <link rel="icon" href="https://04617a0df94285d09abebd5a8e5835aac1e8c013.googledrive.com/host/0B_gfdy0sVQGrU0R1c3dLdkFzbFE/logo.png">
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Lato:400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://04617a0df94285d09abebd5a8e5835aac1e8c013.googledrive.com/host/0B_gfdy0sVQGrU0R1c3dLdkFzbFE/email.css">

	<style >
	
		.logo-sub{
			margin-top: 0px !important;
			color: white;
			font-size: 14px;
		}

		/*
		 * Font
		 */
		h3, h4, h5, .btn-default, .txtMont, footer {
		  font-family: 'Montserrat', sans-serif !important;
		  color: black !important;
		}

		p, small, .text{
		  font-family: 'Lato', sans-serif !important;
		  color: black !important;
		}
	</style>
</head>
<body>

		<div class = "navbar">
			<div class="container">
			<center><img src="https://04617a0df94285d09abebd5a8e5835aac1e8c013.googledrive.com/host/0B_gfdy0sVQGrU0R1c3dLdkFzbFE/logo_H.png" class="img-responsive" width="300 px" alt="UIsioner"> <br/>
			<small class="logo-sub">Gathering data has never been this fun.</small></center>
			</div>
		</div>
<div class="content">
	<div class="container">
		<div class="panel panel-default">
	        <div class="panel-body">
				<br/>
		        <h3 style="margin-bottom:20px;">Halo {{$data[1]}}!</h3>
				<h4>Kami ingin memberi tahu bahwa terdapat kuesioner baru yang dapat anda isi!
				<p>Berikut ini adalah list kuesioner yang tersedia:</p></h4>
				
				 @foreach ($data[0] as $key => $value)
				    @if($value > 0)
				    	<p class="text">
			    		<strong>{{ $value }}</strong> form baru untuk kamu yang merupakan mahasiswa<strong> {{ $key }}</strong>.<br>
			    		</p>
				    @endif
			    @endforeach

				<br/>
				<center><h3>Tunggu apa lagi? segera tekan link dibawah ini dan kumpulkan poin untuk mendapatkan pulsa!</h3>
				<h4><a href="http://localhost/Uisioner/application/">Go to UIsioner</a></h4></center>
				<br/>

	        </div>
	    </div>

	</div>
</div>
	<footer class="footer">
		<div class="container">
			<p class="txtMont">&copy; 2016 PPL-B06</p>
		</div>
	</footer>
</body>
</html>