<html>


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
        echo "Duplicate entries found. Please enter your team again ensuring no player appears twice.";
        echo '<p><a href="javascript:history.go(-1)">Go Back</a></p>';

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
    }

        }
    }
}



?>





<head>
<title id = "title">Build Your Team</title>
   
   <link rel="stylesheet" href="mystyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="navbar.css">
    <style>
     
      
	  #submitBtn {
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
    margin: 0 auto;
	
}

     
    
	 
	 
	#successmessage{height:100%;text-align:center;}
   
           
           
   
 
 
 
        h2 {font-size:12pt}
        p {font-size:10pt}
 




table {
                  margin-top: 0px;
  margin-left: auto;
  margin-right: 100px;
  margin-bottom:20px;
height:450px;
                  width: 40%;
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
            
			tr:nth-child(odd) {
                  background-color: #f5f5f5;
            }
            
            td{border: 1px #DDD solid; padding: 5px; cursor: pointer;}
			
		
            
      .button-container {
  height: 200px;
  position: relative;
  

}
           
      
                 
                 
              .center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}   

                 
.cell-content {
    width: 100%;
    box-sizing: border-box; 
    padding: 3px; 
    border: none #ccc; 
  
    font-size: 14px;
	background-color: #f5f5f5;
}

                 
 #mainheading{text-align:center;font-size:40px;}
         
       
main{position: relative; left: 0; top: 0;width:auto;height:50%;}
     
       
        
				#table1 tr td:first-child {
  width: 40%;
}

#instructions {
			position: fixed;
			top: 150;
			left: 100;
			width: 30%;
			height: 450px;
			background-color: #f1f1f1;
			padding: 20px;
box-sizing: border-box;
border:5px solid;
 border-radius: 5px;
 background-color:#C8F0EB;
 font-color:blue;}
			
		
           
      @media only screen and (max-width: 800px) {
	  
	  
	  
	  h1{font-size:30px;margin-bottom:20px;margin-top:20px;
	  }
	  
	  table {	float:right;
                  width: 30%;
				 
                  
            }
			
			.cell-content{font-size:11px;}
			
			
			#submitBtn{z-index:0}
			
		    .button-container {
  height: 200px;
  position: relative;
  z-index:0;

}

#instructions {
			font-size:12px;
			top: 138

	  }



	  
    </style>
   
    <script>
	function next() {window.location.href = "finishedteam.php"; }
	</script>
    
   
</head>

<body>
<div class="navbar">
		<a href="HomePage.php">Home</a>
		<a href="#news">View existing finished team</a>
		<a href="#test">Compare your team</a>
		<div class="dropdown">
			<button class="dropbtn">Logged in as <?php echo $_SESSION["username"]; ?>
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="firstpage.html" >Sign out</a>
			</div>
		</div> 
	</div>

	<input type="checkbox" style = "display:none;" id="menuToggle">
<label for="menuToggle" class="menu-icon">&#9776;</label>
	
	
	
	<nav class="menu">
	<ul>
    	<li><a href="#">Home</a></li>
        <li><a href="#">View existing finished team</a></li>
        <li><a href="#">Compare your team</a></li>
        <li style= "background-color: red;"><a href="#">Sign out    <i style="font-size:24px" class="fa">&#xf08b;</i></a> </li>
 
    </ul>
</nav>
	
	
	

<h1 id = "mainheading" >Build Team</h1>





        


<div style="height: 450px;">


<head>
    <title> Build Your Team </title>
	<link rel="stylesheet" href="mystyle.css">
	
	
	
	
	
</head>

<div id ="instructions">

<h2 style = "text-align:center;"> Instructions & Info</h2>
<ul>
<li>Choose a player from the dropdown list for each position</li><br>
  <li>Ensure there are no duplicate entries on submission</li><br>
  <li>Players will be arranged in a 4-4-2 formation</li><br>
  <li>Players are classed as Goalkeepers, Defenders, Midfielders and Strikers meaning that players can play in multiple positions within their area of the pitch - e.g. Midfielders such as Kevin De Bruyne can play Centre Midfield, Left or Right Midfield</li>
</ul>
</div>


 <div id = "successmessage" style = "display:none">
 
 <h1>Your team is now complete!</h1>
 
 <p>Now continue to see your team on the pitch!</p>
</div>

<form action="" method="POST" >
<table id="table1" border="2px">
<tr>
<th>Player</th>
<th>Position</th>
<th>Shirt Number</th>
</tr>

 
 
 <?php
// Retrieve footballer names from the database
$footballers_query = "SELECT PlayerName, position FROM footballer";
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
   
   
    </div>

   
   
   <div class="button-container">
		
	
	<div class="center">
   
   
   <input type="submit"  value="Submit Team" id="submitBtn" 
		/>
   
   
</form>
        
 

   
<button style = "display:none;background-color:green;"; id ="finishbtn" onclick="window.location.href = 'finishedteam.php';">Finish</button> 



	</div>

 
 

    
     
     
     

     
     
     

     
     
     


     
 
     
     

      








</body>

</html>