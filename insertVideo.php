<?php
header('Refresh: 5; URL=http://cgi.sice.indiana.edu/~team46/final/admin.php?loc=videoentry');

$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }


//escape variables for security sql injection
$Title = mysqli_real_escape_string($con, $_POST['Title']);
$Description = mysqli_real_escape_string($con, $_POST['Description']);
$URL = mysqli_real_escape_string($con, $_POST['URL']);
$deleter = mysqli_real_escape_string($con, $_POST['deleter']);


if ($deleter == "DELETE")
{
	$sql = "DELETE FROM videos WHERE Title = '$Title'";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>The entry has been deleted</h3>";
}
else
{
	//Insert query to insert form data into the videos table
	$sql="REPLACE INTO videos (Title, Description, URL) 
	VALUES ('$Title','$Description', '$URL')";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Educational video posted</h3>";
}

echo "Returning to administrative panel.";

mysqli_close($con);
?>