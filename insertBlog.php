<?php
header('Refresh: 5; URL=http://cgi.sice.indiana.edu/~team46/final/admin.php?loc=blogentry');

$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

//escape variables for security sql injection
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$postBody = mysqli_real_escape_string($con, $_POST['postBody']);
$podcast = mysqli_real_escape_string($con, $_POST['podcast']);
$deleter = mysqli_real_escape_string($con, $_POST['deleter']);
$postDate = date("Y-m-d H:i:s");

if ($deleter == "DELETE")
{
	$sql = "DELETE FROM blogPost WHERE subject = '$subject'";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>The blog entry has been deleted</h3>";
}
else
{
	//Insert query to insert form data into the blog table
	$sql="REPLACE INTO blogPost (subject, postBody, podcast, postDate) 
	VALUES ('$subject','$postBody','$podcast', '$postDate')";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Blog post added</h3>";
}

$subject = str_replace(' ', '', $subject);
$target_dir = "blogPics/";
$target_file = $target_dir . basename($_FILES["blogImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"]))
{
	$check = getimagesize($_FILES["blogImage"]["tmp_name"]);
	if($check !== false) 
	{
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		
		if(file_exists($target_dir . $subject. ".jpg"))
		{
			unlink($target_dir . $subject . ".jpg");
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
	if (move_uploaded_file($_FILES["blogImage"]["tmp_name"], $target_dir . $subject . "." . $imageFileType))
	{
		echo "The file " . basename($_FILES["blogImage"]["name"]) . " has been uploaded.<br>";
	}
	else
	{
		//echo "File upload failed.<br>";
	}
}

echo "Returning to administrative panel.";

mysqli_close($con);
?>