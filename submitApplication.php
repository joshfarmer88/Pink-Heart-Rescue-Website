<?php
header('Refresh: 10; URL=http://cgi.sice.indiana.edu/~team46/final/');

$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }


//escape variables for security sql injection
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$dog = mysqli_real_escape_string($con, $_POST['dog']);
$whyDog = mysqli_real_escape_string($con, $_POST['whyDog']);
$adults = mysqli_real_escape_string($con, $_POST['adults']);
$supportive = mysqli_real_escape_string($con, $_POST['supportive']);
if ($supportive != "1") { $supportive = "0"; }
$allergy = mysqli_real_escape_string($con, $_POST['allergy']);
if ($allergy != "1") { $allergy = "0"; }
$children = mysqli_real_escape_string($con, $_POST['children']);
if ($children != "1") { $children = "0"; }
$childrenDetail = mysqli_real_escape_string($con, $_POST['childrenDetail']);
$pets = mysqli_real_escape_string($con, $_POST['pets']);
if ($pets != "1") { $pets = "0"; }
$petsDetails = mysqli_real_escape_string($con, $_POST['petsDetails']);
$fence = mysqli_real_escape_string($con, $_POST['fence']);
if ($fence != "1") { $fence = "0"; }
$fenceType = mysqli_real_escape_string($con, $_POST['fenceType']);
$surrender = mysqli_real_escape_string($con, $_POST['surrender']);
if ($surrender != "1") { $surrender = "0"; }
$surrenderReason = mysqli_real_escape_string($con, $_POST['surrenderReason']);
$sold = mysqli_real_escape_string($con, $_POST['sold']);
if ($sold != "1") { $sold = "0"; }
$soldReason = mysqli_real_escape_string($con, $_POST['soldReason']);
$experience = mysqli_real_escape_string($con, $_POST['experience']);
$breedBefore = mysqli_real_escape_string($con, $_POST['breedBefore']);
if ($breedBefore != "1") { $breedBefore = "0"; }
$breedKnowledge = mysqli_real_escape_string($con, $_POST['breedKnowledge']);
$merleOwn = mysqli_real_escape_string($con, $_POST['merleOwn']);
if ($merleOwn != "1") { $merleOwn = "0"; }
$merleNeeds = mysqli_real_escape_string($con, $_POST['merleNeeds']);
if ($merleNeeds != "1") { $merleNeeds = "0"; }
$addInfo = mysqli_real_escape_string($con, $_POST['addInfo']);
$initial1 = mysqli_real_escape_string($con, $_POST['initial1']);
$initial2 = mysqli_real_escape_string($con, $_POST['initial2']);
$initial3 = mysqli_real_escape_string($con, $_POST['initial3']);
$initial4 = mysqli_real_escape_string($con, $_POST['initial4']);
$initial5 = mysqli_real_escape_string($con, $_POST['initial5']);
$initial6 = mysqli_real_escape_string($con, $_POST['initial6']);
$initial7 = mysqli_real_escape_string($con, $_POST['initial7']);
$vetName = mysqli_real_escape_string($con, $_POST['vetName']);
$vetAddress = mysqli_real_escape_string($con, $_POST['vetAddress']);
$vetPhone = mysqli_real_escape_string($con, $_POST['vetPhone']);
$ref1Name = mysqli_real_escape_string($con, $_POST['ref1Name']);
$ref1Relation = mysqli_real_escape_string($con, $_POST['ref1Relation']);
$ref1Phone = mysqli_real_escape_string($con, $_POST['ref1Phone']);
$ref2Name = mysqli_real_escape_string($con, $_POST['ref2Name']);
$ref2Relation = mysqli_real_escape_string($con, $_POST['ref2Relation']);
$ref2Phone = mysqli_real_escape_string($con, $_POST['ref2Phone']);

$sql="REPLACE INTO application
(name, email, address, phone, dog, whyDog, adults, supportive, allergy, children, childrenDetail, pets, petsDetails, fence, fenceType, surrender, surrenderReason, sold, soldReason, experience, breedBefore, breedKnowledge, merleOwn, merleNeeds, addInfo, initial1, initial2, initial3, initial4, initial5, initial6, initial7, vetName, vetAddress, vetPhone, ref1Name, ref1Relation, ref1Phone, ref2Name, ref2Relation, ref2Phone, submitDate) 
VALUES ('$name', '$email', '$address', '$phone', '$dog', '$whyDog', '$adults', $supportive, $allergy, $children, '$childrenDetail', $pets, '$petsDetails', $fence, '$fenceType', $surrender, '$surrenderReason', $sold, '$soldReason', '$experience', $breedBefore, '$breedKnowledge', $merleOwn, $merleNeeds, '$addInfo', '$initial1', '$initial2', '$initial3', '$initial4', '$initial5', '$initial6', '$initial7', '$vetName', '$vetAddress', '$vetPhone', '$ref1Name', '$ref1Relation', '$ref1Phone', '$ref2Name', '$ref2Relation', '$ref2Phone', CURDATE())";

//check for error on insert
if (!mysqli_query($con,$sql))
	{ die('Error: ' . mysqli_error($con)); }

//pull new ID to display
$result = mysqli_query($con,"SELECT applicationID FROM application WHERE name='$name'");
while($row = mysqli_fetch_array($result))
{
	echo "<br><h2>Thanks " . $name . ", we've received your application to adopt " . $dog . ".</h2><h3>We'll be in touch with you once we've considered your application.</h3><h2>Your application number is <u>" . $row['applicationID'] . "</u></h2><br><br>Returning to homepage.";
}

mysqli_close($con);
?>