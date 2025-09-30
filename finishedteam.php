<?php

 session_start ();
 



$server = 'localhost';

	$user = 'root';

	$password = '';

	$database = 'project';
	
	$valid=false;
	$greeting="";




	$conn = mysqli_connect($server,$user,$password,$database);
	
	
	if (isset($_SESSION["logged_in"]) != true) {
	echo "<p>Sorry, you have been logged out</p>";
} 

if (mysqli_connect_errno())

{

echo "<h1>Connection Error</h1>";

echo "Failed to connect to MySQL Database: " . mysqli_connect_error();

die();

}

// retrieve 11 footballers from the userteam table
$sql = "SELECT * FROM userteam WHERE username = '{$_SESSION["username"]}' LIMIT 11";
$result = mysqli_query($conn, $sql);


// create an array to hold the footballers
$footballers = array();

// loop through the query result and add each footballer to the array
while ($row = mysqli_fetch_assoc($result)) {
    $footballers[] = $row;
}

// close the database connection
mysqli_close($conn);

if (count($footballers) != 11) {
   echo '<div style=" padding: 10px; margin-bottom: 10px;text-align:center;font-family:Arial;font-size:20px;">';
echo '<p>Looks like you have not made a team yet. You need to make one before being able to view it or compare it to other users.</p>';
echo '<p style="margin-top: 10px;"><a href="howitworks.php" style="text-decoration: none; color: white; background-color: black; padding: 5px 10px; border-radius: 5px;">Create a Team</a></p>';
echo '</div>';
} else{
?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="mystyle.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="navbar.css">

    <title>My Team</title>
    <style>
	
	#pitch2{margin-top:50px;
            background-color: green;
			background-image: url('pitchportrait.jpg');
			background-size: 400px 500px;
            width: 400px;
            height: 500px;
            position: relative;
			 border: 10px solid black;
			 border-radius: 10px;
	display:none;}
	
	.player-name {
    width: 100px;
    text-align: center;
    line-height: 1.2;
font-weight: bold;
	  


}

       
        #pitch1 {
            background-color: green;
			background-image: url('pitch.jpg');
			background-size: 1000px 550px;
            width: 1000px;
            height: 550px;
            position: relative;
			 border: 10px solid black;
			 border-radius: 10px;
        }
        .player {
            position: absolute;
            border: 1px solid black;
            width: 100px;
            height: 56px;
         
            line-height: 40px;
			margin:auto;
        }
		
		
    .pitch-container {
        margin: auto;
		height:550px;
        width: 1000px; 
		
    }

img  {width: 100px;
height: 56px;
}

h1 {text-align:center;margin-top:10px;}
h2 {text-align:center;margin-top:10px;}

@media only screen and (max-width: 800px) {
	
#pitch1{display:none;}


	#pitch2 {display:block;
        }

	 .pitch-container {
        margin: auto;
		height:500px;
        width: 400px; 
		
    }
	
	
	 .player {
           
            border: 1px solid black;
            width: 60px;
            height: 33.75px;
         
            line-height: 1px;
			margin:auto;
        }
		
		img  {width: 60px;
height: 33.75px;
}

.player-name {
    width: 60px;
    text-align: center;
    line-height: 1.2;
font-weight: bold;
font-size:12px;
	  


}

}
 


    </style>
</head>
<body>
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

  <?php echo '<h1>' . "Introducing " . $_SESSION["clubName"] . '</h1>'; ?>

	<h2> This is how your team lines up on the pitch!  </h2>
	
	<div class="pitch-container">
	
    <div id="pitch1">
	
        <?php
        // set up the positions for a 4-4-2 formation
        $positions = array(
      array("x" => 75, "y" => 245),
    array("x" => 325, "y" => 57.5),
    array("x" => 325, "y" => 182.5),
    array("x" => 325, "y" => 307.5),
    array("x" => 325, "y" => 432.5),
    array("x" => 615, "y" => 57.5),
    array("x" => 575, "y" => 182.5),
    array("x" => 575, "y" => 307.5),
    array("x" => 595, "y" => 432.5), 
    array("x" => 825, "y" => 370),
    array("x" => 825, "y" => 120),
	);


        // loop through the footballers array and display each player on the pitch
       foreach ($footballers as $key => $player) {
    $position = $positions[$key];
    echo '<div class="player" style="top: ' . $position['y'] . 'px; left: ' . $position['x'] . 'px;">';
	echo '<div class="player-info">';
	 echo '<img src="' . $player['image'] . '" alt="' . $player['PlayerName'] . '">';
	  echo '<div class="player-name">' . $player['PlayerName'] . '</div>';
  
	 echo '</div>'; // close the player-info div
    echo '</div>'; // close the player div
       } ?>
		</div>
		  
		 


		 <div id="pitch2">
	
        <?php
        // set up the positions for a 4-4-2 formation
        $positions = array(
      array("x" => 170, "y" => 400),
    array("x" => 280, "y" => 300),
    array("x" => 207, "y" => 300),
    array("x" => 130, "y" => 300),
    array("x" => 55, "y" => 300),
    array("x" => 55, "y" => 180),
    array("x" => 130, "y" => 200),
    array("x" => 207, "y" => 200),
    array("x" => 280, "y" => 180), 
    array("x" => 247.5, "y" => 75),
    array("x" => 97.5, "y" => 75),
	);


        // loop through the footballers array and display each player on the pitch
       foreach ($footballers as $key => $player) {
    $position = $positions[$key];
    echo '<div class="player" style="top: ' . $position['y'] . 'px; left: ' . $position['x'] . 'px;">';
	echo '<div class="player-info">';
	 echo '<img src="' . $player['image'] . '" alt="' . $player['PlayerName'] . '">';
	  echo '<div class="player-name">' . $player['PlayerName'] . '</div>';
  
	 echo '</div>'; // close the player-info div
    echo '</div>'; // close the player div
       } ?>
		</div>
		
    </div>


</body>
</html> <?php } ?>
