<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<div class='para'>

<table border='1'>

<tr>
<th>Description</th>
<th>Amount</th>
</tr>

<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(Name) as numDogs FROM dog where adopterName=''")
?>

<?php
while($row = mysqli_fetch_array($result))
{
	
	echo "<td>Total dogs available for adoption: </td><td align='right'>" . $row['numDogs'] . "</td>";


}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(Name) as adoptedDogs FROM dog where adopterName!=''")
?>

<?php
while($row = mysqli_fetch_array($result))
{
	
	echo "<td>Total dogs that have been adopted: </td><td align='right'>" . $row['adoptedDogs'] . "</td>";


}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(blind) as blindDogs FROM dog WHERE blind=1")
?>

<?php 
while($row = mysqli_fetch_array($result))
{
	echo "<td>Total dogs that are blind for adoption: </td><td align='right'>" .$row['blindDogs'] . "</td>";
}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(deaf) as deafDogs FROM dog WHERE deaf=1")
?>

<?php 
while($row = mysqli_fetch_array($result))
{
	echo "<td>Total dogs that are deaf for adoption: </td><td align='right'>" .$row['deafDogs'] . "</td>";
}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT count(*) as bothDogs from dog where blind=1 and deaf=1")
?>

<?php 
while($row = mysqli_fetch_array($result))
{
	echo "<td>Total dogs that are both blind and deaf for adoption: </td><td align='right'>" .$row['bothDogs'] . "</td>";
}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(approved) as acceptForm FROM application WHERE approved=1")
?>

<?php 
while($row = mysqli_fetch_array($result))
{
	echo "<td>Total adoption forms accepted: </td><td align='right'>" .$row['acceptForm'] . "</td>";
}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(approved) as denyForm FROM application WHERE approved=-1")
?>

<?php 
while($row = mysqli_fetch_array($result))
{
	echo "<td>Total adoption forms denied: </td><td align='right'>" .$row['denyForm'] . "</td>";
}
mysqli_close($con);
?>
</tr>
<tr>
<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT COUNT(approved) as pendingForm FROM application WHERE approved=0")
?>

<?php 
while($row = mysqli_fetch_array($result))
{
	echo "<td>Total adoption forms pending: </td><td align='right'>" .$row['pendingForm'] . "</td>";
}
mysqli_close($con);
?>

</tr>
</table>

</div>

</br>

<?
}
?>