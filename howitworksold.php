<!DOCTYPE html>
<html>
<head>
	<title>Creating a team - How it works</title>
	
	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}

		li {
			float: left;
			width: 25%;
			text-align: center;
		}

		li:last-child {
			float: right;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}
		
		body{text-align: center;}
		
		
		
	</style>
</head>
<body>
	<?php 
		session_start();
		$server = 'localhost';
		$user = 'root';
		$password = '';
		$database = 'project';
		$valid=false;
		$greeting="";
		$connection = mysqli_connect($server,$user,$password,$database);
		if (isset($_SESSION["logged_in"]) != true) {
			echo "<p>Sorry, you have been logged out</p>";
		} 
	?>
	<ul>
		<li><a href="#home">Home</a></li>
		<li><a href="#news">View existing team</a></li>
		<li><a href="#contact">Compare your team to others</a></li>
		
		<li><a href="" style = "background-color: green; pointer-events: none">Logged in as <?php echo $_SESSION["username"]; ?></a></li>
	</ul>
	<h1>Creating a team - How it Works</h1> 
	<p>You will shown a table of the best footballers of all time - past and present. You have the freedom to create your own team from the selection provided, whether it be the strongest team possible or your favourite players!</p>
	<?php echo '<p>It\'s time to bring ' . $_SESSION["clubName"] . ' to life!</p>'; ?>
	<p>Please note that by clicking begin you will delete any already existing teams you have made!</p>
	<?php 
		$delete = "DELETE FROM userteam WHERE `username`='{$_SESSION["username"]}'";
		mysqli_query($connection, $delete);
		echo '<button onclick="window.location.href = \'buildteam.php\';">Begin</button>';
		exit();
	?> 
</body>
</html>
