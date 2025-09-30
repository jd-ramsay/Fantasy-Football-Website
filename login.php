


<html>

<head> <link rel="stylesheet" href="mystyle.css"> 

<style>

.container {
        text-align: center;
      }
	  
	  
	  
	  body{ display: flex;
  justify-content: center;
  align-items: center;
	  height: 100vh;}
</style>


</head>




<body>

<div class ="container"> 
<?php 

session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$loginUser=$_POST['userName'];
		$loginPass=$_POST['userPass'];
		
		
		}
			
	






$server = 'localhost';

	$user = 'root';

	$password = '';

	$database = 'project';
	
	$valid=false;
	$greeting="";




	$conn = mysqli_connect($server,$user,$password,$database);
	

if (mysqli_connect_errno())

{

echo "<h1>Connection Error</h1>";

echo "Failed to connect to MySQL Database: " . mysqli_connect_error();

die();

}


$sql = " SELECT * FROM `userdetails` WHERE `username`='".$loginUser."'";

$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) { 
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				if($row["password"]==$loginPass){
					
					$valid=true;
					$greeting=$row["username"];
					$clubName=$row["clubName"];
					$_SESSION["logged_in"] = true;
					$_SESSION["username"] = $greeting;
					$_SESSION["clubName"] = $clubName;
				}
				
}
					
				
				
				mysqli_close($conn);



if ($valid==true){
	//Building website using echo 
	echo "<h2>Welcome ".$greeting."! </h2>"; 
	echo "<br>";
	echo "<h3>  You have logged in successfully</h3>";
	echo "<br>";
	echo "<p> Click <a href = 'HomePage.php'>here </a> to go to main menu";
	
	
	}
	else
	
		{echo"<h2>User Authentication Failed</h2>";
		
		echo "<h3>You are not logged in</h3>";
		echo "<p>The username or password you entered has not been recognised</p>";
		
		echo "<p> Click <a href = 'loginpage.html'>here </a> to go back to the login page</p>";
		
		}


?>
</div>



</body>
</html>
