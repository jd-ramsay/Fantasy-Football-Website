<html>


<head>

<style>

.container {
        text-align: center;
      }

  body{ display: flex;
  justify-content: center;
  align-items: center;
	  height: 100vh;}
	 @media only screen and () {
  body {
    
}
</style>


<link rel="stylesheet" href="mystyle.css">


</head>

<body>

<div class="container">
<?php

$server = 'localhost';

	$user = 'root';

	$password = '';

	$database = 'project';


	$connection = mysqli_connect($server,$user,$password,$database);
	

if (mysqli_connect_errno())

{

echo "<h1>Connection Error</h1>";

echo "Failed to connect to MySQL Database: " . mysqli_connect_error();



die();

}

ini_set('display_errors', 0);

        $uname = $_POST['uname'] ;
        $pword = $_POST['pword'] ;
        $clubName = $_POST['clubName'] ;
		$favteam = $_POST['favteam'] ;
		$age = $_POST['age'] ;
		$email=$_POST['email'] ;
		$phonenumber=$_POST['phonenumber'] ;
		
		
		
		
		
		$sql = " SELECT * FROM `userdetails` WHERE `username`='".$uname."'";
		
		$conn = mysqli_connect($server,$user,$password,$database);
		
		$result = mysqli_query($conn, $sql);
		
		
		if (mysqli_num_rows($result) > 0) { 
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				if($row["username"]==$uname){ echo "<h3>There is already an account with the username - </h3>";
				echo "<h3> $uname </h3>"; 
				echo "<p> Click <a href = 'firstpage.html'>here </a> to go back to the register/login page.";}
												
				
				
				
		}
		
		
		mysqli_close($conn);
					
					
					
		
		
		        $query_string = "INSERT INTO userdetails (username, password, clubName, favteam, age, email, phonenumber) VALUES ('$uname','$pword','$clubName','$favteam','$age','$email','$phonenumber')";


if(mysqli_query($connection, $query_string))
        {
            
			
			
           echo "<p style='font-size: 25px;'> Thanks for registering!</p>";
echo "<p style='font-size: 25px;'><i>$uname</i></p>";
echo "<p style='font-size: 25px;'> You're now ready to login!</p>";
echo "<p style='font-size: 25px;'> Click <a href='loginpage.html'>here</a> to now log in!</p>";

        }
       
      
        //close the connection
        mysqli_close($connection)
    ?>



 </div>

 </body>
</html>