<?php

header('Refresh: 5; URL=http://cgi.sice.indiana.edu/~team46/final/admin.php?loc=blogentry');

$target_dir = "adoptedPics/";
$target_file = $target_dir . basename($_FILES["dogImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"]))
{
	$check = getimagesize($_FILES["dogImage"]["tmp_name"]);
	if($check !== false) 
	{
		$uploadOk = 1;
	}
	else
	{
		//echo "<File is not an image.<br>";
		$uploadOk = 0;
	}
}

if ($uploadOk == 0) 
{
	//echo "File upload failed.";
}
else
{
	if (move_uploaded_file($_FILES["dogImage"]["tmp_name"], $target_dir . $_FILES["dogImage"]["name"] . "." . $imageFileType))
	{
		echo "The file " . basename($_FILES["dogImage"]["name"]) . " has been uploaded.<br>";
	}
	else
	{
		//echo "File upload failed.<br>";
	}
}

echo "Returning to administrative panel.";
?>