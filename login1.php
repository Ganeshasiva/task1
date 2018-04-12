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
		
		if (isset($_POST['login'])){
		$username = $_POST['username'];
		$password_1 = $_POST['password_1'];
		//$errors=[];
		// ensure that form fields are filled properly	
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		
		if (count($errors) ==0 ) {
			$insert = "SELECT * FROM users WHERE username='$username' AND password = '$password_1'";
			$result = $mysqli->query($insert);
						  if($cou=$result->fetch_assoc()){
						//if (count($cou) == 1) {
								// log user in
								$_SESSION['username'] = $username;
								$_SESSION['success'] = "You are now logged in";
								header('location: index.php'); // redierct to home page
								}
							else{
								array_push($errors, "wrong username/Password combination 
								your not registered please sign up");
								}
						}
		}
		//logout
		if (isset($_GET['logout']))  {
			session_destroy();
			unset($_SESSION['username']);
			header('location: login.php');
		}
		
		
?>