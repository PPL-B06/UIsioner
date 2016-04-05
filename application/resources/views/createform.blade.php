@extends('layout')

@section('page-title') {{ "| Home" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
<script type='text/javascript'>
        function addFields(){
			//menambahkan field baru
			var qlength = document.getElementById("formulir").getElementsByTagName("INPUT").length-19;
			var node = document.createElement("DIV");
			node.classList.add("form-group");
			var node1 = document.createElement("LABEL");
			node1.classList.add("control-label");
			node1.classList.add("col-sm-1");
			node1.setAttribute("for", ""+qlength);
			node1.appendChild(document.createTextNode(""+qlength));
			var node2 = document.createElement("DIV");
			node2.classList.add("col-sm-11");
			var node21 = document.createElement("INPUT");
			node21.classList.add("form-control");
			node21.setAttribute("name", ""+qlength);
			node21.setAttribute("id", ""+qlength);
			node21.setAttribute("type", "text");
			node21.setAttribute("placeholder", "Enter Question");
			node2.appendChild(node21);
			node.appendChild(node1);
			node.appendChild(node2);
			document.getElementById("formulir").appendChild(node);
			
			//update value qnumber
			document.getElementById("qnumber").value=qlength;
        }
		function deleteFields(){
			//menghilangkan field terakhir
			var list = document.getElementById("formulir");
			var qlength = list.getElementsByTagName("INPUT").length-19;
			if(qlength>2)
			{
			list.removeChild(list.lastChild);
			
			//update value qnumber
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
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/postform') }}">
			<div id="formulir">
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Title</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Description</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Target Number</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="targetnumber" id="targetnumber" placeholder="Enter Target Number">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="title">Reward</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="reward" id="reward" placeholder="Enter Reward">
				</div>
			  </div>
			  <div class="form-group">
				<label>Target</label>
				<div class="checkbox"><label><input type="checkbox" name="tar0" value="01">KEDOKTERAN</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar1" value="02">KEDOKTERAN GIGI</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar2" value="03">MIPA</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar3" value="04">FISIP</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar4" value="05">TEKNIK</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar5" value="06">HUKUM</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar6" value="07">EKONOMI</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar7" value="08">FIB</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar8" value="09">PSIKOLOGI</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar9" value="10">FKM</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar10" value="12">FASILKOM</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar11" value="13">FIK</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar12" value="14">PASCASARJANA</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar13" value="15">VOKASI</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar14" value="16">PEROLEHAN KREDIT</label></div>
				<div class="checkbox"><label><input type="checkbox" name="tar15" value="17">FARMASI</label></div>
			  </div>
				 <!--<div class="form-group">
				  <label for="target">Target:</label>
				  <select class="form-control" id="target" name="target">
					<option value="01">KEDOKTERAN</option>
					<option value="02">KEDOKTERAN GIGI</option>
					<option value="03">MIPA</option>
					<option value="04">FISIP</option>
					<option value="05">TEKNIK</option>
					<option value="06">HUKUM</option>
					<option value="07">EKONOMI</option>
					<option value="08">FIB</option>
					<option value="09">PSIKOLOGI</option>
					<option value="10">FKM</option>
					<option value="12">FASILKOM</option>
					<option value="13">FIK</option>
					<option value="14">PASCASARJANA</option>
					<option value="15">VOKASI</option>
					<option value="16">PEROLEHAN KREDIT</option>
					<option value="17">FARMASI</option>
				  </select>
				 </div>-->
			  <div class="form-group">
				<label class="control-label col-sm-1" for="1">1</label>
				<div class="col-sm-11">
				  <input type="text" class="form-control" name="1" id="1" placeholder="Enter Question">
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
				  <button type="submit" class="btn btn-default">Submit</button>
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