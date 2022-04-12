<form action="{{ route('login_process') }}" method="POST">
	@csrf

	<input type="text" name="email" id="email" placeholder="Enter the E-Mail">
	<input type="password" name="password" id="password" placeholder="Enter the password">

	<button type="submit" class="btn btn-primary">Log in</button>
</form>