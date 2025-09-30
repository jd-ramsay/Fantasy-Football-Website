<!DOCTYPE html>

   <?php
        // Connect to database
		
		
		
        $server = 'localhost';

	$user = 'root';

	$password = '';

	$database = 'project';


	$conn = mysqli_connect($server,$user,$password,$database);
	
	
	session_start ();
	
	
	
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








if (mysqli_num_rows($result) != 11) {
   echo '<div style=" padding: 10px; margin-bottom: 10px;text-align:center;font-family:Arial;font-size:20px;">';
echo '<p>Looks like you have not made a team yet. You need to make one before being able to view it or compare it to other users.</p>';
echo '<p style="margin-top: 10px;"><a href="howitworks.php" style="text-decoration: none; color: white; background-color: black; padding: 5px 10px; border-radius: 5px;">Create a Team</a></p>';
echo '</div>';
} else{
?>




        
<html>
  <head>
    <title>Select Usernames Team</title>
 <link rel="stylesheet" href="mystyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="navbar.css">
	
	<style> h1 {text-align: center;}
	
	
	.content {
  width: 100%; /* or any other desired width */
  margin: 0 auto;
  height:100%;
  font-size:20px;
  text-align:center;

  
}
	
	#submitBtn{             
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
   
    background-color: black;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 0 auto;
    cursor: pointer;
    border-radius: 5px;
    height: 100px;
    width: 200px;
    
	

  
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
	
	<div class = "content">
    <h1>Compare your team!</h1>
    <form method="POST" action ="viewother.php">
      <label for="username">Select a username:</label>
      <select id="username" name="username">
       

<?php
        // Query database for list of usernames
	$sql = "SELECT username FROM userteam WHERE username != '{$_SESSION["username"]}' GROUP BY username";

        $result = mysqli_query($conn, $sql);

        // Display each username as an option in the dropdown menu
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
        }

        // Close database connection
        mysqli_close($conn);
	
?>

      </select>
      <br><br>
      <input type="submit" id = "submitBtn" value="Compare">
    </form>


<div>
  
  </body>
</html><?php } ?>
