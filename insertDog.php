<?php
header('Refresh: 5; URL=http://cgi.sice.indiana.edu/~team46/final/admin.php?loc=dogentry');


$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }


//escape variables for security sql injection
$Name = mysqli_real_escape_string($con, $_POST['Name']);
$DoB = mysqli_real_escape_string($con, $_POST['DoB']);
$Gender = mysqli_real_escape_string($con, $_POST['Gender']);
$Bio = mysqli_real_escape_string($con, $_POST['Bio']);
$Breed = mysqli_real_escape_string($con, $_POST['Breed']);
$surrenderName = mysqli_real_escape_string($con, $_POST['surrenderName']);
$surrenderPhone = mysqli_real_escape_string($con, $_POST['surrenderPhone']);
$surrenderEmail = mysqli_real_escape_string($con, $_POST['surrenderEmail']);
$surrenderVet = mysqli_real_escape_string($con, $_POST['surrenderVet']);
$surrenderVetPhone = mysqli_real_escape_string($con, $_POST['surrenderVetPhone']);
$surrenderDate = mysqli_real_escape_string($con, $_POST['surrenderDate']);
$surrenderMethod = mysqli_real_escape_string($con, $_POST['surrenderMethod']);
$fixed = mysqli_real_escape_string($con, $_POST['fixed']);
if ($fixed != "1") { $fixed = "0"; }
$shots = mysqli_real_escape_string($con, $_POST['shots']);
if ($shots != "1") { $shots = "0"; }
$flea = mysqli_real_escape_string($con, $_POST['flea']);
if ($flea != "1") { $flea = "0"; }
$heartworm = mysqli_real_escape_string($con, $_POST['heartworm']);
if ($heartworm != "1") { $heartworm = "0"; }
$seenByVet = mysqli_real_escape_string($con, $_POST['seenByVet']);
if ($seenByVet != "1") { $seenByVet = "0"; }
$biting = mysqli_real_escape_string($con, $_POST['biting']);
if ($biting != "1") { $biting = "0"; }
$cats = mysqli_real_escape_string($con, $_POST['cats']);
if ($cats != "1") { $cats = "0"; }
$dogs = mysqli_real_escape_string($con, $_POST['dogs']);
if ($dogs != "1") { $dogs = "0"; }
$children = mysqli_real_escape_string($con, $_POST['children']);
if ($children != "1") { $children = "0"; }
$houseTrained = mysqli_real_escape_string($con, $_POST['houseTrained']);
if ($houseTrained != "1") { $houseTrained = "0"; }
$heartwormPos = mysqli_real_escape_string($con, $_POST['heartwormPos']);
if ($heartwormPos != "1") { $heartwormPos = "0"; }
$blind = mysqli_real_escape_string($con, $_POST['blind']);
if ($blind != "1") { $blind = "0"; }
$deaf = mysqli_real_escape_string($con, $_POST['deaf']);
if ($deaf != "1") { $deaf = "0"; }
$disabilities = mysqli_real_escape_string($con, $_POST['disabilities']);
$adopterName = mysqli_real_escape_string($con, $_POST['adopterName']);
$adopterPhone = mysqli_real_escape_string($con, $_POST['adopterPhone']);
$adopterEmail = mysqli_real_escape_string($con, $_POST['adopterEmail']);
$adopterAddress = mysqli_real_escape_string($con, $_POST['adopterAddress']);
$adoptionDate = mysqli_real_escape_string($con, $_POST['adoptionDate']);
$hasDogs = mysqli_real_escape_string($con, $_POST['hasDogs']);
if ($hasDogs != "1") { $hasDogs = "0"; }
$hasCats = mysqli_real_escape_string($con, $_POST['hasCats']);
if ($hasCats != "1") { $hasCats = "0"; }
$hasChildren = mysqli_real_escape_string($con, $_POST['hasChildren']);
if ($hasChildren != "1") { $hasChildren = "0"; }
$experience = mysqli_real_escape_string($con, $_POST['experience']);
if ($experience != "1") { $experience = "0"; }
$fence = mysqli_real_escape_string($con, $_POST['fence']);
if ($fence != "1") { $fence = "0"; }
$deleter = mysqli_real_escape_string($con, $_POST['deleter']);

if ($deleter == "DELETE")
{
	$sql = "DELETE FROM dog WHERE Name = '$Name'";
	
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Dog has been deleted</h3>";
}
else
{
	//Insert query to insert form data into the dog table
	$sql="REPLACE INTO dog (Name,DoB,Gender,Bio,Breed,surrenderName,surrenderPhone,surrenderEmail,surrenderVet,surrenderVetPhone,surrenderDate,surrenderMethod,
	fixed,shots,flea,heartworm,seenByVet,biting,cats,dogs,children,houseTrained,heartwormPos,blind,deaf,disabilities,
	adopterName,adopterPhone,adopterEmail,adopterAddress,adoptionDate,hasDogs,hasCats,hasChildren,experience,fence) 
	VALUES ('$Name','$DoB','$Gender','$Bio','$Breed','$surrenderName','$surrenderPhone','$surrenderEmail','$surrenderVet','$surrenderVetPhone','$surrenderDate','$surrenderMethod',
	$fixed,$shots,$flea,$heartworm,$seenByVet,$biting,$cats,$dogs,$children,$houseTrained,$heartwormPos,$blind,$deaf,'$disabilities',
	'$adopterName','$adopterPhone','$adopterEmail','$adopterAddress','$adoptionDate',$hasDogs,$hasCats,$hasChildren,$experience,$fence)";
	//check for error on insert
	if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

	echo "<h3>Dog database updated.</h3>";
}

$target_dir = "dogPics/";
$target_file = $target_dir . basename($_FILES["dogImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"]))
{
	$check = getimagesize($_FILES["dogImage"]["tmp_name"]);
	if($check !== false) 
	{
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		
		if(file_exists($target_dir . $Name . ".jpg"))
		{
			unlink($target_dir . $Name . ".jpg");
		}
	}
	else
	{
		//echo "File is not an image.";
		$uploadOk = 0;
	}
}

$extensions= array("jpg");
      
if (in_array($imageFileType,$extensions)=== false)
{
	//echo "Incorrect file type. Must be JPG.";
	$uploadOk = 0;
}

if ($uploadOk == 0) 
{
	//echo "File upload failed.";
}
else
{
	if (move_uploaded_file($_FILES["dogImage"]["tmp_name"], $target_dir . $Name . "." . $imageFileType))
	{
		echo "The file " . basename($_FILES["dogImage"]["name"]) . " has been uploaded.";
	}
	else
	{
		//echo "File upload failed.";
	}
}

echo "Returning to administrative panel.";

mysqli_close($con);
?>