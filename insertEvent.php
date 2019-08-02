<?php
header('Refresh: 5; URL=http://cgi.sice.indiana.edu/~team46/final/admin.php?loc=evententry');

$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

//escape variables for security sql injection
$title = mysqli_real_escape_string($con, $_POST['title']);
$place = mysqli_real_escape_string($con, $_POST['place']);
$dateAndTime = mysqli_real_escape_string($con, $_POST['dateAndTime']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$deleter = mysqli_real_escape_string($con, $_POST['deleter']);

if ($deleter == "DELETE")
{
	$sql = "DELETE FROM event WHERE title = '$title'";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>The event has been deleted</h3>";
}
else
{
	//Insert query to insert form data into the event table
	$sql="REPLACE INTO event (title, place, dateAndTime, description) 
	VALUES ('$title','$place','$dateAndTime', '$description')";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Event posted</h3>";
}

$title = str_replace(' ', '', $title);
$target_dir = "eventPics/";
$target_file = $target_dir . basename($_FILES["eventImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"]))
{
	$check = getimagesize($_FILES["eventImage"]["tmp_name"]);
	if($check !== false) 
	{
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		
		if(file_exists($target_dir . $title . ".jpg"))
		{
			unlink($target_dir . $title . ".jpg");
		}
	}
	else
	{
		//echo "<File is not an image.<br>";
		$uploadOk = 0;
	}
}

$extensions= array("jpg");
      
if (in_array($imageFileType,$extensions) === false)
{
	//echo "Incorrect file type. Must be JPG.<br>";
	$uploadOk = 0;
}

if ($uploadOk == 0) 
{
	//echo "File upload failed.";
}
else
{
	if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $target_dir . $title . "." . $imageFileType))
	{
		echo "The file " . basename($_FILES["eventImage"]["name"]) . " has been uploaded.<br>";
	}
	else
	{
		//echo "File upload failed.<br>";
	}
}

echo "Returning to administrative panel.";

mysqli_close($con);
?>