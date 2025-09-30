<?php

session_start ();

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


if(isset($_REQUEST['sub']))
{
$a = $_REQUEST['uname'];
$b = $_REQUEST['upassword'];

$res = mysqli_query($cser,"select* from users where uname='$a'and upassword='$b'");
$result=mysqli_fetch_array($res);
if($result)
{
	
	$_SESSION["login"]="1";
	header("location:HomePage.php");
}
else	
{
	header("location:login.php?err=1");
	
}
}
?>