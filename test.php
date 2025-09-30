<html>

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


?>


test


<head>


<style>

	 @media only screen and () {
  body {
    
}
</style>

</head>

<body>




 
</body>
</html>