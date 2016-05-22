<a href="{{ url('create-form') }}"><button type="button" class="btn btn-default animate navbar-btn"><i class="fa fa-plus fa-lg" aria-hidden="true" title="Create form"></i> <span id="button-text">Create form</span></button></a>

<div class="btn-group">
	<button type="button" class="btn btn-default animate dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-caret-down fa-lg"></i></span></button>
	
	<ul class="dropdown-menu dropdown-menu-right">
		@if(session()->get('role') == 'admin')
		<li><a href="{{ url('coin-requests') }}">Coin requests</a></li>
		<li><a href="{{ url('email-blast') }}">Email blast</a></li>
		<li role="separator" class="divider"></li>
		@endif
		<li><a href="{{ url('my-forms') }}">My forms</a></li>
		<li><a href="{{ url('my-responses') }}">My responses</a></li>
		<li id="coins" data-toggle="modal" data-target="#exampleModal">
			<a href="#">My coins: <span class="badge">{{ DB::table('users')->where('NPM','=',session()->get('npm'))->first()->coin }}</span></a>
		</li>
		<li role="separator" class="divider"></li>
		<li><a href="{{ url('logout') }}">Log out</a></li>
	</ul>
</div>