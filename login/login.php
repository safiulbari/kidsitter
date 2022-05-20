<html>

<head>
	<title> Login From Desing </title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
	<body>
		<div class="loginbody">
				<form action="..\validation\validation.php" method="post">
				<div class="loginbox">
				<h1>Login Here</h1>
					<div class="input-group mb-3">
						<label class="input-group-text" for="Login-method">Select Method</label>
						<select class="form-select" id="Login-method", name="Login-method">
							<option selected>User</option>
							<option value="Admin">Admin</option>
							<option value="Baby Sitter">Baby Sitter</option>
						</select>
					</div>
					<br>
					<p>User name<font color=blue>*</font>
					</p>
					<input type="text" name="user" placeholder="Enter User name" required>
					<p>Password<font color=blue>*</font>
					</p>
					<input type="Password" name="password" placeholder="Enter Password" required>
					<input type="submit" name="" value="Login">

					<a href="..\signup\signup.php"> Sign up </a>
				</form>
			</div>
		</div>

	</body>
</html>