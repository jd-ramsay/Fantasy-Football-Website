<!DOCTYPE html>
<?php
session_start();
$server = 'localhost';
			$user = 'root';
			$password = '';
			$database = 'project';
			$connection = mysqli_connect($server,$user,$password,$database);
			if (mysqli_connect_errno()) {
				echo "<h2>Connection Error</h2>";
				echo "<p>Failed to connect to MySQL Database: " . mysqli_connect_error() . "</p>";
				die();
			}
?>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="mystyle.css">
	<style>
		body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
		}
		
		header {
			background-color: #333;
			color: #fff;
			padding: 20px;
			text-align: center;
			font-size: 36px;
			margin-bottom: 30px;
		}
		
		.container {
			max-width: 800px;
			margin: 0 auto;
			text-align: center;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
			border-radius: 10px;
			font-size:18px;
		}
		
		h2 {
			margin-bottom: 20px;
			font-size: 28px;
			text-align: left;
			display: inline-block;
			margin-right: 20px;
		}
		
		.logout {
			display: inline-block;
			padding: 10px 15px;
			background-color: #333;
			color: #fff;
			border-radius: 5px;
			margin: 10px;
			font-size: 18px;
			text-decoration: none;
			transition: all 0.2s ease-in-out;
		}
		
		.logout:hover {
			background-color: #555;
		}
		
		.action {
			display: inline-block;
			padding: 10px 20px;
			background-color: #333;
			color: #fff;
			border-radius: 5px;
			margin: 10px;
			font-size: 18px;
			text-decoration: none;
			transition: all 0.2s ease-in-out;
		}
		
		.action:hover {
			background-color: #555;
		}
		
		@media only screen and (max-width: 800px) {
  .logout {
    position: static;
  }
  
  h2 {
			margin-bottom: 20px;
			font-size: 14px;
			text-align: left;
			display: inline-block;
			margin-right: 20px;
		}
		
	.logout {
			
			font-size: 14px;
			
		}	
		
		
	.container {
			
			font-size:14px;
		}	
	
}
	</style>
</head>
<body>
	<header>
		<h2>Football Draft Home Page</h2>
		<a href="firstpage.html" class="logout">Logout</a>
	</header>
	<div class="container">
		<?php
			
			if (isset($_SESSION["logged_in"]) != true) {
				echo "<h2>Sorry, you have been logged out</h2>";
			} else {
				echo "<p>Select an action to continue:</p>";
				echo "<a href='howitworks.php' class='action'>Create new team</a>";
				echo "<a href='finishedteam.php' class='action'>View existing team</a>";
				echo "<a href='compareother.php' class='action'>Compare team to other users</a>";
				
			}
		?>
	</div>
</body>
</html>
