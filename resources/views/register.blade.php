<form action="{{ route('register_process') }}" method="POST">
	@csrf

	<input type="text" name="name" id="name" placeholder="Enter name">
	<input type="text" name="email" id="email" placeholder="Enter E-Mail">
	<input type="password" name="password" id="password" placeholder="Enter password">
	<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm the password">

	<button type="submit" class="btn btn-primary">Log in</button>
</form>