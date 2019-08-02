<?php
header('Refresh: 5; URL=http://cgi.sice.indiana.edu/~team46/final/admin.php?loc=viewAllApps');

$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
	{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$applicationID = mysqli_real_escape_string($con, $_POST['applicationID']);
$update = mysqli_real_escape_string($con, $_POST['update']);

if ($update == "DELETE")
{
	$sql = "DELETE FROM application WHERE applicationID = '$applicationID'";
	
	//check for error on deletion
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Application Deleted</h3>";
}

else if ($update == "APPROVED")
{
	$sql = "UPDATE application SET approved = 1 WHERE applicationID = '$applicationID'";
	
	//check for error on approval
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Application Approved</h3>";
}

else if ($update == "DENIED")
{
	$sql = "UPDATE application SET approved = -1 WHERE applicationID = '$applicationID'";
	
	//check for error on denial
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Application Denied</h3>";
}

else
{
	echo "<h4>No Changes were made to the application.</h4>";
}

echo "Returning to administrative panel.";

mysqli_close($con);
?>