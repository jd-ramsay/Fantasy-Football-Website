

<html>
<head>
<?php
 
 session_start ();
 
$server = 'localhost';

      $user = 'root';

      $password = '';

      $database = 'project';


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

$connection = mysqli_connect("localhost", "root", "", "project");
$size=sizeof($_POST); 
$number=$size/3;
for($i=1;$i<=$number;$i++)
{
    $numberone="columnone".$i;
    $first[$i]=$_POST[$numberone];
    $numbertwo="columntwo".$i;
    $second[$i]=$_POST[$numbertwo];
    $numberthree="columnthree".$i;
    $third[$i]=$_POST[$numberthree];
}




for($i=1;$i<=$number;$i++) //loop for each player
{
    $check = "SELECT PlayerName, username FROM userteam WHERE `username`='{$_SESSION["username"]}' AND playerName = '{$first[$i]}'";


    $result = mysqli_query($connection, $check);

    if(mysqli_num_rows($result) > 0) {
		
        // If there are duplicate entries, display an error message and link is displayed
       echo '<div style=" padding: 10px; margin-bottom: 10px;text-align:center;font-family:Arial;font-size:20px;">';
echo '<p>Duplicate entries found. Please enter your team again ensuring no player appears twice.</p>';
echo '<p style="margin-top: 10px;"><a href="javascript:history.go(-1)" style="text-decoration: none; color: white; background-color: black; padding: 5px 10px; border-radius: 5px;">Go Back</a></p>';
echo '</div>';


        // Delete the duplicate entries
        $delete = "DELETE FROM userteam WHERE `username`='{$_SESSION["username"]}'";
        mysqli_query($connection, $delete);

        exit();
    } else {
        $query = "INSERT INTO userteam (PlayerName, position, number, username, image) VALUES ('$first[$i]', '$second[$i]',  '$third[$i]', '{$_SESSION["username"]}', '{$first[$i]}.jpg')";

        if(mysqli_query($connection, $query))
        {
           
            if ($i == $number) {
   
    echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("submitBtn").style.display = "none"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("finishbtn").style.display = "block"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("table1").style.display = "none"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("successmessage").style.display = "block"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("mainheading").style.display = "none"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("instructions").style.display = "none"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("left").style.display = "none"; });</script>';
	echo '<script>document.addEventListener("DOMContentLoaded", function() { document.getElementById("right").style.display = "none"; });</script>';
    }

        }
    }
}



?>



      <title>Build Your Team</title>
      
      
	  <link rel="stylesheet" href="mystyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="navbar.css">
	
	  
      
      <style>
      
	  
	  #finishBtn,#submitBtn{             
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


#submitBtn{
	height: 50px;
width: 200px;
top:525px;
}
	
	  
	  .cell-content {
    width: 100%;
    box-sizing: border-box; 
    padding: 3px; 
    border: none #ccc; 
    font-size: 17px;
	background-color: #f5f5f5;
}
	  	#table1 tr td:first-child {
  width: 40%;
}
	  #table1 {   margin-top: 0px;
	  height:450px;	   
				border-collapse: collapse;
				   border: 2px solid #ccc;width: 100%;
				 
				   
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
            
			tr:nth-child(odd) {
                  background-color: #f5f5f5;
            }
            
            td{border: 1px #DDD solid; padding: 5px; cursor: pointer;}
			
	  
	  #mainheading{text-align:center;font-size:50px;}
      
            button{margin-top:50px;}
            
            .container {
                  display: flex;
                  flex-direction: row;
                  width: 100%;
                  height: 75%;
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

            

            
            
          #instructions {
			
			margin-top:0px;
			width: 80%;
			height: 530px;
			background-color: #f1f1f1;
			padding: 20px;
box-sizing: border-box;
border:5px solid;
 border-radius: 5px;
 background-color:#C8F0EB;
 font-color:blue;}
            
			body {  min-width:550px; }
		
		  @media only screen and (max-width: 800px) {  
		  
		  h1{margin-top:10px;}
		  
		  .cell-content {font-size: 10px;}
		 #mainheading{font-size:30px;}
			  
		  
			  #instructions{font-size:12px;margin-top:10px;}
			  
			 #instructions h2{font-size:14px;}
			 
	#table1{width:110%;margin-left:-40px;margin-top:10px;}
	
	#submitBtn{
	
height: 50px;
		  width: 150px;}
	
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
	
	<div id = "successmessage" style = "display:none;text-align:center;">
 
 <h1>Your team is now complete!</h1>
 
 <p>Now continue to see your team on the pitch!</p>
 
 
 
 <button style = "display:none;background-color:green;"; id ="finishbtn" onclick="window.location.href = 'finishedteam.php';">Finish</button>
</div>
	
	
	<h1  id = "mainheading" >Build Your Team</h1>
      <div class="container">
            <div class="section your-team" id = "left">
			
			<div id ="instructions">
			<h2 style = "text-align:center;"> Instructions & Info</h2>
<ul>
<li>Choose a player from the dropdown list for each position</li><br>
  <li>Ensure there are no duplicate entries on submission</li><br>
  <li>Players will be arranged in a 4-4-2 formation</li><br>
  <li>Players are classed as Goalkeepers, Defenders, Midfielders and Strikers meaning that players can play in multiple positions within their area of the pitch - e.g. Midfielders such as Kevin De Bruyne can play Centre Midfield, Left or Right Midfield</li>
</ul>
			</div>
			
                   </div>
                  <div class="section usernames-team" id ="right">
                   
            
                  <form action="" method="POST" >
<table id="table1" >
<tr>
<th>Player</th>
<th>Position</th>
<th>Shirt Number</th>
</tr>

 
 
 <?php
// Retrieve footballer names from the database
$footballers_query = "SELECT PlayerName, position FROM footballer ORDER BY PlayerName";
$footballers_result = mysqli_query($connection, $footballers_query);
$footballers = array();
while($row = mysqli_fetch_assoc($footballers_result)) {
    $footballers[$row['position']][] = $row['PlayerName'];
}

for($i=1;$i<=11;$i++)
{
?>

<tr>
<td>



  <!-- Generate the dropdown list -->
    <select name="columnone<?php echo $i; ?>" class="cell-content">
        <?php
        switch($i){
            case 1:
                $players = $footballers['GK'];
                break;
            case 2:
            case 3:
            case 4:
            case 5:
                $players = $footballers['Defender'];
                break;
            case 6:
            case 7:
            case 8:
            case 9:
                $players = $footballers['Midfielder'];
                break;
            case 10:
            case 11:
                $players = $footballers['Attacker'];
                break;
            default:
                $players = array();
                break;
        }
       
	   
	   
	   
        foreach($players as $player) { ?>
            <option value="<?php echo $player; ?>"><?php echo $player; ?></option>
        <?php } ?>
		
		</select>
		
		
</td>
<td>
<input type="text" name="columntwo<?php echo $i; ?>" readonly="readonly" class="cell-content" value="<?php
    switch($i){ //switch statement - acts as an if statement, in this case if $i = 1 then column 2 shows GK, if $i = 2,3,4 or 5 column 2 shows Defender and so on.
        case 1:
            echo 'Goalkeeper';
            break;
        case 2:
			echo 'Left back';
			break;
        case 3:
        case 4:
			echo 'Centre back';
			break;
        case 5:
            echo 'Right back';
            break;
        case 6:
			echo 'Left Midfield';
			break;
        case 7:
		case 8:
			echo 'Centre Midfield';
			break;
        case 9:
            echo 'Right Midfield';
            break;
        case 10:
        case 11:
            echo 'Striker';
            break;
        default:
            break;
    } ?>" />
</td>
<td>
<input type="text" name="columnthree<?php echo $i; ?>" readonly="readonly" class="cell-content" value="<?php
      switch($i) {
            case 1: echo '1';
                  break;
            case 2: echo '2';
                  break;
            case 3: echo '3';
                  break;      
            case 4: echo '4';
                  break;            
            case 5: echo '5';
                  break;            
            case 6: echo '6';
                  break;            
            case 7: echo '7';
                  break;            
            case 8: echo '8';
                  break;            
            case 9: echo '9';
                  break;            
            case 10: echo '10';
                  break;            
            case 11: echo '11';
      break;      } ?>" />
</td>
</tr>
<?php
}
?>
 





</table>
   <input type="submit"  value="Submit Team" id="submitBtn" 
		/>
   
   </form>
   
    </div>

               
                
                  
      
            </div>
			
			
			
</body>