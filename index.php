<?php include('server.php'); ?>
<?php include('login1.php');
		//if user is not logged in, they can't access this page
		if(empty($_SESSION['username'])) {
		header('location: login.php');
		}
?>

<?php
	if(isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		echo $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `username`, `email`, `password`) LIKE '%".$valueToSearch."%'";
		
		$search_result = filterTable($query);
	}
	else  {
		$query = "SELECT * FROM 'users'";
		$search_result = filterTable($query);
	}

	function filterTable($query)
	{
			// Create connection to database
				$connect =  mysqli_connect("localhost", "root", "root", "user");
				$filter_Result = mysqli_query($connect, $query);
				return $filter_Result;
		 
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>User registration system</title>
		<style>
		table,tr,th,td {
			border: 1px solid black;
		}
	</style>
	</head>
	<body>
		<div>
		 <h2>Home Page</h2>
		</div>
		<div>
			<?php if (isset($_SESSION['success'])){ ?>
				<div>
					<h3>
					<?php	
						echo $_SESSION['success'];
						unset ($_SESSION['success']);
						?>
						</h3> 
				</div>
			<?php } ?>
		<?php if (isset($_SESSION["username"])){ ?>
			<h3>Your Information: </h3>
			<p><strong>Username:<?php echo $_SESSION['username']; ?></strong></p>
			<p><a href="login.php?logout='1'" style="text-decoration:none; color: red;">Logout</a></p>
			
		<?php } ?>

		<!-- here we are using filter table -->
		<form action="index.php" method="POST">
		<input type="text" name="valueToSearch" placeholder="valueToSearch"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>

		<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Password</th>
		</tr>
		<?php while($row = mysql_fetch_array($search_result)): ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['password']; ?></td>
			</tr>
		<?php endwhile; ?>
		</table>
	</form>
		
		</div>
	</body>
</html>