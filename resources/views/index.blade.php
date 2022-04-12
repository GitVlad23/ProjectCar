@auth('web')
	<h1>You are loggined as {{ $user = auth()->user()->name }}</h1>
	<a href="{{ route('logout') }}" type="button" class="btn btn-danger">Log out</a>
@endauth

@guest('web')
	<a href="{{ route('login') }}" type="button" class="btn btn-danger">Log in</a>
	<a href="{{ route('register') }}" type="button" class="btn btn-danger">Sing up</a>
@endguest


@if(session()->has('register'))
	<h3 class="alert alert-success">{{ session()->get('register') }}</h3>
@endif

@if(session()->has('busy'))
	<h3 class="alert alert-success">{{ session()->get('busy') }}</h3>
@endif


@auth('web')
	@if($user = auth()->user()->is_driving == 1)
		<h3>You are driving right now! If you wanna drive other cars, you must leave from this one!</h3>

		<?php $user = auth()->user()->car_id; ?>

		<a href="{{ route('drive', $user) }}">Back to the drive</a>
		<a href="{{ route('exit', $user) }}">Leave the car</a>
	@endif

	@if($user = auth()->user()->is_driving == 0)
		@foreach($cars as $el)
		<div style="border-bottom: 2px solid black">
			<p>Model: {{ $el->model }}</p>
			<form action="{{ route('drive', $el->id) }}" method="get">
				<button type="submit" class="btn btn-success">Drive</button>
			</form>
		</div>
		@endforeach
	@endif
@endauth


@guest('web')
		@foreach($cars as $el)
		<div style="border-bottom: 2px solid black">
			<p>Model: {{ $el->model }}</p>
			<form action="{{ route('drive', $el->id) }}" method="get">
				<button type="submit" class="btn btn-success">Drive</button>
			</form>
		</div>
		@endforeach
@endguest