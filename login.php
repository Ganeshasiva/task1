<?php include('login1.php');  ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Form</title>
		

	</head>
	<body>
		<div>
		 <h2>login</h2>
		</div>
		
		<form method="post" action="login.php">
		<!--- display validation error here  -->
		<?php include("errors.php"); ?>	

		<table width="100" border="0">
		<div class="input-group">
			<tr><td><label>Username</label></td><td>:</td><td>
			<input type="text" name="username"></td></tr>
		</div>

		<div class="input-group">
			<tr><td><label>Password</label></td><td>:</td><td>
			<input type="password" name="password_1"></td></tr>
		</div>

	</table></br>


		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		<p>Not yet a member? <a href="register.php" style="text-decoration:none">Sign up</a></p>
		</form>
	</body>
</html>