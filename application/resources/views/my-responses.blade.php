@extends('layout')

@section('page-title') {{ " | My Responses" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('content')
<div class="container">
	<div class="row content">
		@foreach($resp_forms as $resp_form)
		<h4>{{ $resp_form->Title }}</h4>
		<p>Filled on {{ date('l, F jS Y', strtotime($resp_form->Time_Stamp)) }}</p>
		@endforeach
	</div>
</div>
@stop