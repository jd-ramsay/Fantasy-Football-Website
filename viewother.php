<?php session_start (); ?>

<html>
<head>
      <title>Split Webpage</title>
      
      
	  <link rel="stylesheet" href="mystyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="navbar.css">
	
	  
      
      <style>
      
      
            button{margin-top:50px;}
            
            .container {
                  display: flex;
                  flex-direction: row;
                  width: 100%;
                  height: 100vh;
            }

            .section {
                  flex: 1;
                  display: flex;
                  flex-direction: column;
                  align-items: center;
                  justify-content: flex-start;
                  padding: 16px;
                  position: relative;
            }

            .section h2 {
                  font-size: 32px;
                  margin-bottom: 16px;
            }

            .your-team {
                  background-color: white ;
            }

            .usernames-team {
                  background-color: #EFE9EB ;
            }
            
            table {
                  padding-top:px;
                  width: 100%;
                  border-collapse: collapse;
            }

            th, td {
                  padding: 8px;
                  border: 1px solid #ccc;
            }

            th {
                  background-color: #eee;
            }

            tr:nth-child(even) {
                  background-color: #f5f5f5;
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
    	<li><a href="homepage.php">Home</a></li>
        <li><a href="finishedteam.php">View existing finished team</a></li>
        <li><a href="compareother.php">Compare team to other users</a></li>
        <li style= "background-color: red;"><a href="logout.php">Sign out    <i style="font-size:24px" class="fa">&#xf08b;</i></a> </li>
 
    </ul>
</nav>
	
      <div class="container">
            <div class="section your-team">
                   <?php echo '<h1>' . $_SESSION["clubName"] . '</h1>'; ?>
                  <p>This is your team.</p>
                  
                  <?php

      $server = 'localhost';

      $user = 'root';

      $password = '';

      $database = 'project';


      $connection = mysqli_connect($server,$user,$password,$database);
      
      if (isset($_SESSION["logged_in"]) != true) {
      echo "<p>Sorry, you have been logged out</p>";
}

      

if (mysqli_connect_errno())

{

echo "<h1>Connection Error</h1>";

echo "Failed to connect to MySQL Database: " . mysqli_connect_error();



die();

}


                  
                  
                  $currentuser = $_SESSION["username"];
                  
                  $query = "SELECT * FROM `userteam` WHERE `username` ='".$currentuser."'";
                  
                  $result = mysqli_query($connection, $query);
                  
                  
                              echo "<table><tr><th>Player Name</th><th>Position</th></tr>";
                                    while ($row = $result->fetch_assoc()) {
                                          echo "<tr><td>".$row["PlayerName"]."</td><td>".$row["position"]."</td></tr>";
}
                        echo "</table>";
                  
                  
        ?>
            
        
                  
                  
                  </div>
                  
                  
                  <div class="section usernames-team">
                   <?php
                   $compareusername=$_POST['username'];
                  
                  
                  $sql = "SELECT `clubName` FROM `userdetails` WHERE `username` = '$compareusername'";
                  
                   $result3 = mysqli_query($connection, $sql);
                  
                        
                        $row = mysqli_fetch_assoc($result3);
                  
                   echo '<h1>' . $row["clubName"] . '</h1>';
                  
                  
                  
                    echo '<p>This is ' . $compareusername . "'s team.</p>";

                  
                  
            
                  
                  
                  
                                    $query2 = "SELECT * FROM `userteam` WHERE `username`='".$compareusername."'";
                                    $result2 = mysqli_query($connection, $query2);
                                    
                                    echo "<table><tr><th>Player Name</th><th>Position</th></tr>";
                                    while ($row = $result2->fetch_assoc()) {
                                          echo "<tr><td>".$row["PlayerName"]."</td><td>".$row["position"]."</td></tr>";
}
                        echo "</table>";
                  
                  
                  
                  
                  ?>
            
            
                  
                
                
                  
      
            </div>
      </div>
</body>
</html>