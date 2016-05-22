@extends('layout')

@section('page-title') {{ "| Create form" }} @stop

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
		node1.appendChild(document.createTextNode("Question "+qlength));
		var node2 = document.createElement("DIV");
		node2.classList.add("col-sm-10");
		var node21 = document.createElement("INPUT");
		node21.classList.add("form-control");
		node21.setAttribute("name", ""+qlength);
		node21.setAttribute("id", ""+qlength);
		node21.setAttribute("type", "text");
		node21.setAttribute("pattern", "([\32-\x7E]){1,127}$");
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
	
	function submitform(){
		var usercoin = document.getElementById("hiddencoin").value;
		var targetnum = document.getElementById("targetnumber").value;
		var reward = document.getElementById("reward").value;
		if(usercoin < targetnum*reward){
		$("#alertModal").modal()  
		return false;
		}
		else
		{return true;}
	}
</script>
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
		  @if ($alert = Session::get('alert'))
			<div class="alert alert-warning alert-def">
			  {{ $alert }}
			</div>
		  @endif
		
			<h4 class="text-uppercase title">Create Form</h4>

			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/post-form') }}">
						<div id="formulir">
					  
							<div class="form-group">
								<label class="control-label col-sm-2" for="title"><strong>Title</strong></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" pattern="([\32-\x7E]){1,127}$" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="title"><strong>Description</strong></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="title"><strong>Target Number</strong></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="targetnumber" id="targetnumber" placeholder="Enter Target Number" pattern="^[0-9]{1,11}$" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="title"><strong>Reward</strong></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="reward" id="reward" placeholder="Enter Reward" pattern="^[0-9]{1,11}$" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2"><strong>Target</strong></label>
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
							<hr>
							<div class="form-group">
								<label class="control-label col-sm-2" for="1"><strong>Question 1</strong></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="1" id="1" placeholder="Enter question" pattern="([\32-\x7E]){1,127}$" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="button" onclick="addFields()" class="btn btn-default animate"><i class="fa fa-plus" aria-hidden="true"></i></button>
								<button type="button" onclick="deleteFields()" class="btn btn-default animate"><i class="fa fa-times" aria-hidden="true"></i> Delete last</button>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox"><label><strong><input type="checkbox" required> I'm sure this is complete</strong></label></div>
							</div>
						</div>
						<input type="text" name="qnumber" id="qnumber" value="1" hidden required>
						<input type="text" name="hiddencoin" id="hiddencoin" value="{{DB::table('users')->where('NPM','=',session()->get('npm'))->first()->coin}}" hidden>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" onClick="return submitform();" class="btn btn-lg btn-default animate pull-right" >Submit</button>
							</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</div>
			</div>
			
	    </div>
	    
		<!-- Modal -->
		<div id="alertModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  
			  <div class="modal-body">
				
				<p class="warned">Maaf, Coin anda tidak cukup untuk membuat form ini.
				</br>
				Coin anda harus sama atau lebih besar dari Reward x Jumlah Target.</p>
				
				<button type="button" class="btn btn-default animate" data-dismiss="modal">Close</button>
			  </div>
			  
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
@stop

@section('custom-scripts')
<script>
    $(document).ready(function(){
		$('li').removeClass('active');
		$('#create-form').addClass('active');
    });
</script>
@stop