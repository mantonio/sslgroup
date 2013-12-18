<section id="registration">
	<form name="register" id="register" method="post" action="?action=register">
		<p>
			<label for="regUser">Username:</label>
			<input id="regUser" name="regUser" type="text">
		</p>

		<p>
			<label for="regPass">Password:</label>
			<input id="regPass" name="regPass" type="password">
		</p>

		<p>
			<label for="email">Email:</label>
			<input id="email" name="email" type="email" placeholder="jsmith@fullsail.edu">
		</p>

		<p>
			<input id="regBtn" name="regBtn" value="Register" type="submit">
		</p>
		
	</form>
</section>

<aside id="loginForm">
	<form name="login" id="login" method="post" action="?action=login">
		<p>
			<label for="username">Username:</label>
			<input id="username" name="username" type="text">
		</p>

		<p>
			<label for="password">Password:</label>
			<input id="password" name="password" type="password">
		</p>

		<p>
			<input id="loginBtn" name="loginBtn" value="Login" type="submit">
		</p>
	</form>
</aside>