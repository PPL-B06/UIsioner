@extends('layout')

@section('page-title') {{ "| MyForm" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
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
        <li><a href="createform">Create Form</a></li>
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
      <h3>My Forms</h3>
    <hr>
	<!--Membuat list form sesuai form yang ada di database-->
	{{--dd($answers)--}}
  {{--$unumber--}}
  <div id="dvData">
  <table border="1" >
  <tr>
  <td>NPM</td>
  <td>Nama</td>
	@foreach ($questions as $question)
    <td>
      {{$question->Title}}
    </td>
	@endforeach
  </tr>

  <?php $in=0; ?>
  @for ($j = 0; $j < $unumber ; $j++)

    <tr>
    <td>{{$answers[$in]->npm}}</td>
    <td>{{$answers[$in]->name}}</td>
    @for ($i = 0; $i < $qnumber ; $i++)
      <td>{{$answers[$in]->title}}</td>
      <?php $in++; ?>
    @endfor
    </tr>

  @endfor 

    </table>
    </div>

    <input type="button" id="btnExport" value=" Export Table data into Excel " />
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
    alert("");
});
</script>
@stop

@section('footer')
<footer class="footer">
  <div class="container">
    <p class="text-muted">&copy; 2016 PPL-B06</p>
  </div>
</footer>
@stop


