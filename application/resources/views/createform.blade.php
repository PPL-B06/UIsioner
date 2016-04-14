@extends('layout')

@section('page-title') {{ "| Home" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
<script type='text/javascript'>
        function addFields(){
			//menambahkan field baru (add Question)
			var qlength = document.getElementById("formulir").getElementsByTagName("INPUT").length-19;
			var node = document.createElement("DIV");
			node.classList.add("form-group");
			var node1 = document.createElement("LABEL");
			node1.classList.add("control-label");
			node1.classList.add("col-sm-2");
			node1.setAttribute("for", ""+qlength);
			node1.appendChild(document.createTextNode("Pertanyaan "+qlength));
			var node2 = document.createElement("DIV");
			node2.classList.add("col-sm-10");
			var node21 = document.createElement("INPUT");
			node21.classList.add("form-control");
			node21.setAttribute("name", ""+qlength);
			node21.setAttribute("id", ""+qlength);
			node21.setAttribute("type", "text");
			node21.setAttribute("pattern", "^[a-zA-Z0-9-_\.]{1,127}$");
			node21.required = true;
			node21.setAttribute("placeholder", "Enter Question");
			node2.appendChild(node21);
			node.appendChild(node1);
			node.appendChild(node2);
			document.getElementById("formulir").appendChild(node);
			
			//update value qnumber (update jumlah nomor pertanyaan)
			document.getElementById("qnumber").value=qlength;
        }
		function deleteFields(){
			//menghilangkan field terakhir (delete last)
			var list = document.getElementById("formulir");
			var qlength = list.getElementsByTagName("INPUT").length-19;
			if(qlength>2)
			{
			list.removeChild(list.lastChild);
			
			//update value qnumber (update jumlah nomor pertanyaan)
			document.getElementById("qnumber").value=qlength-2;
			}
		}
    </script>
@stop

@section('navbar')
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
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Create Form</a></li>
        <li><a href="#">My Form</a></li>
        <li><a href="#">My Responses</a></li>
        <li><a href="#">&copy; 50</a></li>
        <li class=""><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
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
      <h3>Create Form</h3>
    <hr>
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/postForm') }}">
			<div id="formulir">
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Title</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" pattern="^[a-zA-Z0-9-_\.]{1,127}$" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Description</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Target Number</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="targetnumber" id="targetnumber" placeholder="Enter Target Number" pattern="^[0-9]{1,11}$" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Reward</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="reward" id="reward" placeholder="Enter Reward" pattern="^[0-9]{1,11}$" required>
				</div>
			  </div>
			  <div class="form-group">
			  	<label class="control-label col-sm-2">Target</label>
			  	<div class="col-sm-10">
					<div class="checkbox"><label><input type="checkbox" name="tar0" value="01">Fakultas Kedokteran</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar1" value="02">Fakultas Kedokteran Gigi</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar2" value="03">Fakultas Matematika & Ilmu Pengetahuan Alam</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar3" value="04">Fakultas Ilmu Sosial & Ilmu Politik</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar4" value="05">Fakultas Teknik</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar5" value="06">Fakultas Hukum</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar6" value="07">Fakultas Ekonomi & Bisnis</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar7" value="08">Fakultas Ilmu Pengetahuan Budaya</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar8" value="09">Fakultas Psikologi</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar9" value="10">Fakultas Kesehatan Masyarakat</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar10" value="12">Fakultas Ilmu Komputer</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar11" value="13">Fakultas Ilmu Keperawatan</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar12" value="14">Program Pascasarjana</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar13" value="15">Program Vokasi</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar14" value="16">Mahasiswa Pertukaran Pelajar</label></div>
					<div class="checkbox"><label><input type="checkbox" name="tar15" value="17">Fakultas Farmasi</label></div>	
			  	</div>
			  </div>
			  <hr></hr>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="1">Pertanyaan 1</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="1" id="1" placeholder="Enter Question" pattern="^[a-zA-Z0-9-_\.]{1,127}$" required>
				</div>
			  </div>
			</div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="button" onclick="addFields()" class="btn btn-default">Add</button><button type="button" onclick="deleteFields()" class="btn btn-default">Delete Last</button>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label><input type="checkbox" required> I'm sure this is complete</label>
				  </div>
				</div>
			  </div>
			  <input type="text" name="qnumber" id="qnumber" value="1" hidden>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-lg btn-success pull-right">Submit</button>
				</div>
			  </div>
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	
    
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

@section('footer')
<footer class="footer">
  <div class="container">
    <p class="text-muted">&copy; 2016 PPL-B06</p>
  </div>
</footer>
@stop