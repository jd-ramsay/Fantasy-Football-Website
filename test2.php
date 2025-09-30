<?php
$connection = mysqli_connect(“localhost”, “root”, “”,”project”)
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
for($i=1;$i<=$number;$i++)
{
$query = "Insert into table_name (one,two,three) values ('$first[$i]','$second[$i]','$three[$i]');
if( mysqli_query($connection , $query))
{
echo “ Data Inserted Successfully”;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> TalkersCode </title>
</head>
<body>
<form action="#" method="post">
<table border="2px" >
<tr>
<th>Column one</th>
<th> Column Two</th>
<th> Column Three </th>
</tr>
<?php
for($i=1;$i<=7;$i++)
{
?>
<tr>
<td>
<input type="text" name="columnone<?php echo $i; ?>" />
</td>
<td>
<input type="text" name=" columntwo<?php echo $i;?>" />
</td>
<td>
<input type="text" name=" columnthree<?php echo $i;?>" />
</td>
</tr>
<?php
}
?>
</table>
<input type="submit" value="Submit"/>
</form>
</body>
</html>