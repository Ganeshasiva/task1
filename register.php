<?php include('server.php');  ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
	</head>
	<body>
		<div class="header">
		 <h2>Register</h2>
		</div>

		<!-- forms started here  -->

		
		<form method="post" action="register.php">
		<!--- display validation error here  -->
		<?php include("errors.php"); ?>

		<table width="100" border="0">
		<div class="input-group">
			<tr><td><label>Username</label></td><td>:</td><td>
			<input type="text" name="username"></td></tr>
		</div>

		<div class="input-group">
			<tr><td><label>Email</label></td><td>:</td><td>
			<input type="text" name="email"></td></tr>
		</div>

		<div class="input-group">
			<tr><td><label>Password</label></td><td>:</td><td>
			<input type="password" name="password_1"></td></tr>
		</div>

	</table></br>


		<div class="input-group">
			<button type="submit" class="btn" name="register">Register</button>
		</div>

		<p>Already a member? <a href="login.php" style="text-decoration:none">Sign in</a></p>
		</form>

	</body>
</html>