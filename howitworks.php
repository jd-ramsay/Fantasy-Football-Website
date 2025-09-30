<!DOCTYPE html>
<html>
<head>
	<title>Creating a team - How it works</title>
	
		<link rel="stylesheet" href="mystyle.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="navbar.css">
	<style>
	
	 h1{font-size:40px;
	  }
	  
	  p{font-size:25px;
	  }
	  
	button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top:5%;
  cursor: pointer;
  border-radius: 5px;
}


	
	.content {
  width: 100%; /* or any other desired width */
  margin: 0 auto;
  height:100%;
  font-size:20px;
  margin-top:5%;
  
}
	
	 
  body{text-align:center;}

  @media only screen and (max-width: 800px) {
	  
	  
	  h1{font-size:23px;margin-top:20px;
	  }
	  
	  p{font-size:20px;
	  }
	  
 


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
	
	<div class="navbar">
		<a href="HomePage.php">Home</a>
		<a href="finishedteam.php">View existing finished team</a>
		<a href="compareother.php">Compare team to other users</a>
		<div class="dropdown">
			<button class="dropbtn">Logged in as <?php echo $_SESSION["username"]; ?>
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="logout.php" >Sign out</a>
			</div>
		</div> 
	</div>
	
	
	<input type="checkbox" style = "display:none;" id="menuToggle">
<label for="menuToggle" class="menu-icon">&#9776;</label>
	
	
	
	<nav class="menu">
	<ul>
    	<li><a href="HomePage.php">Home</a></li>
        <li><a href="finishedteam.php">View existing finished team</a></li>
        <li><a href="compareother.php">Compare team to other users</a></li>
        <li style= "background-color: red;"><a href="logout.php">Sign out    <i style="font-size:24px" class="fa">&#xf08b;</i></a> </li>
 
    </ul>
</nav>
	
	
	
	
		<h1>Creating a team - How it Works</h1> <br><br>
		<p>You will be shown a table of the best footballers of all time - past and present. <br><br> You have the freedom to create your own team from the selection provided, whether it be the strongest team possible or your favourite players!</p>
	<br>	<?php echo '<p>It\'s time to bring <strong>' . $_SESSION["clubName"] . '</strong> to life!</p>'; ?>

		<p>Please note that by clicking begin you will delete any already existing teams you have made.</p>
		<?php 
			$delete = "DELETE FROM userteam WHERE `username`='{$_SESSION["username"]}'";
			mysqli_query($connection, $delete);
			echo '<button onclick="window.location.href = \'buildteam.php\';">Begin</button>';
			exit();
		?> 
	

	
</body>
</html>
