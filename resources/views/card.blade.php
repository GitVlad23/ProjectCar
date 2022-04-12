<h1>You are driving on {{ $car->model }}</h1>

@if(session()->has('warning'))
	<p class="alert alert-success">{{ session()->get('warning') }}</p>
@endif

<?php $carID = $car->id ?>

<a href="{{ route('exit', $carID) }}" type="button" class="btn btn-danger">Stop driving</a>