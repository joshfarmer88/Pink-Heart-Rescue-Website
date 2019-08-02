<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");

//function for empty entries
function noEntry($variable)
{
	if (!$variable) echo "<i>No Entry</i>";
	else echo $variable;
}

//function for boolean responses
function yesNo($var)
{
	if ($var == '1') echo "Yes";
	elseif ($var == 0) echo "No";
	else echo "<i>Bad Data</i>";
}

$applicationID = $_GET['applicationID'];

if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
if (!$result = mysqli_query($con,"SELECT * FROM application WHERE applicationID=$applicationID"))
{
    die("Error: " . mysqli_error($con));
}
?>

<div class='para'>

<?php
while($row = mysqli_fetch_array($result))
{
?>
APPLICATION STATUS: 
<?php
if($row['approved'] == 1)
	echo "Approved";
else if($row['approved'] == -1)
	echo "Denied";
else
	echo "Pending";?>

<br><br>Applicant Information
<table border='1'>
<tr><td>Application ID</td><td><?php noEntry($row['applicationID']); ?></td></tr>
<tr><td>Applicant Name</td><td><?php noEntry($row['name']); ?></td></tr>
<tr><td>Applicant Email</td><td><?php noEntry($row['email']); ?></td></tr>
<tr><td>Applicant Address</td><td><?php noEntry($row['address']); ?></td></tr>
<tr><td>Applicant Phone</td><td><?php noEntry($row['phone']); ?></td></tr>
</table><br>


Application
<table border='1'>
<tr><td>Applying to adopt <?php noEntry($row['dog']); echo ", because"; ?></td><td><?php noEntry($row['whyDog']); ?></td></tr>
<tr><td>Adults in Household<br>Name, Age, Relation to you, Employer</td><td><?php noEntry($row['adults']); ?></td></tr>
<tr><td>Is the household supportive of adopting?</td><td><?php yesNo($row['supportive']); ?></td></tr>
<tr><td>Any dog allergies in the household?</td><td><?php yesNo($row['allergy']); ?></td></tr>
<tr><td>Any children in the household?</td><td><?php yesNo($row['children']); ?></td></tr>
<tr><td>Names and Ages of children</td><td><?php noEntry($row['childrenDetail']); ?></td></tr>
<tr><td>Any other pets in the household?</td><td><?php yesNo($row['pets']); ?></td></tr>
<tr><td>Other pets in household<br>Name, Age, Breed, Gender, Spayed/Neutered</td><td><?php noEntry($row['petsDetails']); ?></td></tr>

<tr><td>Fence Type</td><td><?php
if($row['fence']==0) 
{
	echo "No fence";
}
else
{
	echo "Fence is ";
	noEntry($row['fenceType']);
}?></td></tr>
</table><br>

Pet History
<table border='1'>
<tr><td><?php
if($row['surrender']==0) 
{
	echo "Has not surrendered to a rescue or shelter";
}
else
{
	echo "Has surrendered to a rescue or shelter";
}
?>
</td><td><?php noEntry($row['surrenderReason']); ?></td></tr>

<tr><td><?php
if($row['sold']==0) 
{
	echo "Has not sold an animal online";
}
else
{
	echo "Has sold an animal online";
}
?>
</td><td><?php noEntry($row['soldReason']); ?></td></tr>

<tr><td>Pet ownership experience</td><td><?php noEntry($row['experience']); ?></td></tr>
<tr><td>Applicant has owned this breed before</td><td><?php yesNo($row['breedBefore']); ?></td></tr>
<tr><td>What applicant knows about the breed</td><td><?php noEntry($row['breedKnowledge']); ?></td></tr>
<tr><td>Applicant has owned a double merle or disabled dog before</td><td><?php yesNo($row['merleOwn']); ?></td></tr>
<tr><td>Applicant is aware of what double merle ownership entails</td><td><?php yesNo($row['merleNeeds']); ?></td></tr>
<tr><td>Questions applicant has</td><td><?php noEntry($row['addInfo']); ?></td></tr>
</table><br>

<?php
if($row['vetName'])
{
	echo "Veterinary Information<table border='1'><tr><td>Current Veterinarian</td><td>";
	noEntry($row['vetName']);
	echo "</td></tr><tr><td>Vet Office Address</td><td>";
	noEntry($row['vetAddress']);
	echo "</td></tr><tr><td>Vet Office Phone</td><td>";
	noEntry($row['vetPhone']);
	echo "</td></tr></table>";
}
else
	echo "No veterinary information entered";
?><br><br>

<?php
if($row['ref1Name'] or $row['ref2Name'])
{
	if($row['ref1Name'])
	{
		echo "Reference One<table border='1'><tr><td>Name</td><td>";
		noEntry($row['ref1Name']);
		echo "</td></tr><tr><td>Relation to Applicant</td><td>";
		noEntry($row['ref1Relation']);
		echo "</td></tr><tr><td>Contact Number</td><td>";
		noEntry($row['ref1Phone']);
		echo "</td></tr></table>";
	}
	if($row['ref2Name'])
	{
		echo "Reference Two<table border='1'><tr><td>Name</td><td>";
		noEntry($row['ref2Name']);
		echo "</td></tr><tr><td>Relation to Applicant</td><td>";
		noEntry($row['ref2Relation']);
		echo "</td></tr><tr><td>Contact Number</td><td>";
		noEntry($row['ref2Phone']);
		echo "</td></tr></table>";
	}
}
else
	echo "No reference information entered";
?>


<br><br>Applicant has initialed all seven required acknowledgments in application: <?php
if(!($row['initial1']) or !($row['initial2']) or !($row['initial3']) or !($row['initial4']) or !($row['initial5']) or !($row['initial6']) or !($row['initial7'])) 
{
	echo "<u><b>NO</b></u>";
}
else
{
	echo "<u>Yes</u>";
}?><br><br><br>


<form action="updateApp.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="applicationID" value="<?php echo $row['applicationID']; ?>">
<i>To approve this application, type <b>APPROVED</b> below.</i><br>
<i>To deny this application, type <b>DENIED</b> below.</i><br><br>

<i>Or type <b>DELETE</b> (case sensitive) below and then press save to </b>permanently delete</b> the current application from database.</i>
<br>
<br>
<input type="text" name="update">
<br>
<br>

<input type="submit" value="Save Change" name="submit">
</br>
</br>
</form>







<!--
/*




<td><?php
if($row['approved'] == 1)
	echo "Approved";
else if($row['approved'] == -1)
	echo "Denied";
else
	echo "Pending";?></td>

<td><a href="viewApp.php?applicationID=<?php echo $row['applicationID']; ?>">View Application</a></td>
</tr> 

*/
-->
<?php
}
mysqli_close($con);
?>

</div>

<?
}
?>