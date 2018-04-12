<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$db="user";
$errors = array();  
	// Create connection to database
		$mysqli = new mysqli("localhost", "root", "root", "user");
		/* check connection */
			if ($mysqli->connect_error) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}
	//if the registration button is clicked

		if (isset($_POST['register'])){
			$username =$_POST['username'];
			$email = $_POST['email'];
			$password_1 = $_POST['password_1'];
	//ensure that form fields are filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		
	// if there are no errors, save user to database
			if (count($errors)==0) {
			$insert = "INSERT INTO users (username, email, password)
								VALUES ('$username', '$email', '$password_1')";
								$mysqli->query($insert);	
								$_SESSION['username']= $username;
								$_SESSION['success'] = "You are now logged in";
								header('location: index.php');  //redirect to home page
		}
		}
		?>