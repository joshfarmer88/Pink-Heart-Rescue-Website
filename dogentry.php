<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<div class='para'>

<b>Dog Details Form</b>
<br>
<br>

<i>Which dog would you like to make changes to?</i>
<br>
<br>

<form action="?loc=dogentry" method="POST">
	<select name="doggies" id="doggies" onchange="this.form.submit()">
	<option value="new">New Dog</option>

<?php

$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
	{
		echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); 
	}
else 
	{ 
		echo nl2br("Established Database Connection \n");
	}

$sql="SELECT * FROM dog";

$result = $con->query($sql);

while($row = $result->fetch_assoc()) 
{
    echo "<option value=" . $row["Name"] . ">" . $row["Name"] . "</option>";
}

?>

</select>

</form>

<?php

if ($_POST["doggies"] != "")
{
	$sql = "SELECT * FROM dog WHERE Name = '" . $_POST["doggies"] . "'";
	
	$result = $con->query($sql);

	while($row = $result->fetch_assoc()) 
	{
		$Name = $row["Name"];
		$DoB = $row["DoB"];
		$Gender = $row["Gender"];
		$Bio = $row["Bio"];
		$Breed = $row["Breed"];
		$surrenderName = $row["surrenderName"];
		$surrenderPhone = $row["surrenderPhone"];
		$surrenderEmail = $row["surrenderEmail"];
		$surrenderVet = $row["surrenderVet"];
		$surrenderVetPhone = $row["surrenderVetPhone"];
		$surrenderDate = $row["surrenderDate"];
		$surrenderMethod = $row["surrenderMethod"];
		$fixed = $row["fixed"];
		$shots = $row["shots"];
		$flea = $row["flea"];
		$heartworm = $row["heartworm"];
		$seenByVet = $row["seenByVet"];
		$biting = $row["biting"];
		$cats = $row["cats"];
		$dogs = $row["dogs"];
		$children = $row["children"];
		$houseTrained = $row["houseTrained"];
		$heartwormPos = $row["heartwormPos"];
		$blind = $row["blind"];
		$deaf = $row["deaf"];
		$disabilities = $row["disabilities"];
		$adopterName = $row["adopterName"];
		$adopterPhone = $row["adopterPhone"];
		$adopterEmail = $row["adopterEmail"];
		$adopterAddress = $row["adopterAddress"];
		$adoptionDate = $row["adoptionDate"];
		$hasDogs = $row["hasDogs"];
		$hasCats = $row["hasCats"];
		$hasChildren = $row["hasChildren"];
		$experience = $row["experience"];
		$fence = $row["fence"];
	}
}
elseif ($_POST["doggies"] == "New Dog")
{
	$Name = "";
	$DoB = "";
	$Gender = "";
	$Bio = "";
	$Breed = "";
	$surrenderName = "";
	$surrenderPhone = "";
	$surrenderEmail = "";
	$surrenderVet = "";
	$surrenderVetPhone = "";
	$surrenderDate = "";
	$surrenderMethod = "";
	$fixed = "";
	$shots = "";
	$flea = "";
	$heartworm = "";
	$seenByVet = "";
	$biting = "";
	$cats = "";
	$dogs = "";
	$children = "";
	$houseTrained = "";
	$heartwormPos = "";
	$blind = "";
	$deaf = "";
	$disabilities = "";
	$adopterName = "";
	$adopterPhone = "";
	$adopterEmail = "";
	$adopterAddress = "";
	$adoptionDate = "";
	$hasDogs = "";
	$hasCats = "";
	$hasChildren = "";
	$experience = "";
	$fence = "";
}

?>

<br>
<br>
<br>

<form action="insertDog.php" method="POST" enctype="multipart/form-data">

<i>Enter all information applicable to this dog.</i>
<br>
<br>
<br>

<b>Dog Details</b>
<br>
<br>

Dog Name:
<br>
<input type="text" name="Name" value="<?php echo $Name;?>">
<br>
<br>

Dog Image:
</br>
<input type="file" name="dogImage" id="dogImage">
</br>
</br>

Biography for Dog:
<br>
<textarea name="Bio" style="height:200px; resize: none;"><?php echo $Bio;?></textarea>
<br>
<br>

Dog Gender:
<br>
<input type="text" name="Gender" value="<?php echo $Gender;?>">
<br>
<br>

Breed:
<br>
<input type="text" name="Breed" value="<?php echo $Breed;?>">
<br>
<br>

Birthdate:
<br>
<input type="date" name="DoB" value="<?php echo $DoB;?>">
<br>
<br>

<br>
<br>

<b>Surrenderer Details</b>
<br>
<br>

Surrenderer Name:
<br>
<input type="text" name="surrenderName" value="<?php echo $surrenderName;?>">
<br>
<br>

Surrenderer Phone:
<br>
<input type="text" name="surrenderPhone" value="<?php echo $surrenderPhone;?>">
<br>
<br>

Surrenderer Email:
<br>
<input type="text" name="surrenderEmail" value="<?php echo $surrenderEmail;?>">
<br>
<br>

Surrenderer Vet:
<br>
<input type="text" name="surrenderVet" value="<?php echo $surrenderVet;?>">
<br>
<br>

Surrenderer Vet Phone:
<br>
<input type="text" name="surrenderVetPhone" value="<?php echo $surrenderVetPhone;?>">
<br>
<br>

Surrender Date:
<br>
<input type="date" name="surrenderDate" value="<?php echo $surrenderDate;?>">
<br>
<br>

Surrenderer Type (Breeder, Owner, etc.):
<br>
<input type="text" name="surrenderMethod" value="<?php echo $surrenderMethod;?>">
<br>
<br>

<br>
<br>
<b>Vet Details</b>
<br>
<br>

Spayed/Neutered:
<input type="checkbox" name="fixed" value="1" 
<?php
if ($fixed == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Shots up-to-date:
<input type="checkbox" name="shots" value="1" 
<?php
if ($shots == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Flea up-to-date:
<input type="checkbox" name="flea" value="1" 
<?php
if ($flea == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Heartworm up-to-date:
<input type="checkbox" name="heartworm" value="1" 
<?php
if ($heartworm == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Has been seen by a vet:
<input type="checkbox" name="seenByVet" value="1" 
<?php
if ($seenByVet == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

<br>
<br>

<b>Behavior Details</b>
<br>
<br>

History of biting:
<input type="checkbox" name="biting" value="1" 
<?php
if ($biting == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

History of living with cats:
<input type="checkbox" name="cats" value="1" 
<?php
if ($cats == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

History of living with other dogs:
<input type="checkbox" name="dogs" value="1" 
<?php
if ($dogs == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

History of living with children:
<input type="checkbox" name="children" value="1" 
<?php
if ($children == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Has the dog been house trained?
<input type="checkbox" name="houseTrained" value="1" 
<?php
if ($houseTrained == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

<br>
<br>

<b>Physical Health Details</b>
<br>
<br>

Is the dog positive for heartworm?
<input type="checkbox" name="heartwormPos" value="1" 
<?php
if ($heartwormPos == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Dog is blind:
<input type="checkbox" name="blind" value="1" 
<?php
if ($blind == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Dog is deaf:
<input type="checkbox" name="deaf" value="1" 
<?php
if ($deaf == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Other disabilities:
<br>
<input type="text" name="disabilities" value="<?php echo $disabilities;?>">
<br>
<br>

<br>
<br>

<b>Adopter Details</b>
<br>
<br>

Adopter Name:
<br>
<input type="text" name="adopterName" value="<?php echo $adopterName;?>">
<br>
<br>

Adopter Phone:
<br>
<input type="text" name="adopterPhone" value="<?php echo $adopterPhone;?>">
<br>
<br>

Adopter Email:
<br>
<input type="text" name="adopterEmail" value="<?php echo $adopterEmail;?>">
<br>
<br>

Adopter Address:
<br>
<input type="text" name="adopterAddress" value="<?php echo $adopterAddress;?>">
<br>
<br>

Adoption Date:
<br>
<input type="date" name="adoptionDate" value="<?php echo $adoptionDate;?>">
<br>
<br>

Does the adopter own other dogs?
<input type="checkbox" name="hasDogs" value="1" 
<?php
if ($hasDogs == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Does the adopter own any cats?
<input type="checkbox" name="hasCats" value="1" 
<?php
if ($hasCats == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Does the adopter have children in the house?
<input type="checkbox" name="hasChildren" value="1" 
<?php
if ($hasChildren == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Does the adopter have experience dealing with dogs with disabilities?
<input type="checkbox" name="experience" value="1" 
<?php
if ($experience == "1")
{
	echo "checked";
}
?>
>
<br>
<br>

Does the home have a fenced-in yard?
<input type="checkbox" name="fence" value="1" 
<?php
if ($fence == "1")
{
	echo "checked";
}
?>
>
<br>
<br>
<br>

<i>When finished, click <b>Save</b> below to save this dog's information to the records.</i>
<br>
<br>

<i>Or type <b>DELETE</b> (case sensitive) below and then press save to </b>permanently delete</b> the currently selected dog from database.</i>
</br>
</br>
<input type="text" name="deleter">
<br>
<br>

<input type="submit" value="Save" name="submit">
</br>
</br>

<?php
mysqli_close($con);
?>

</form>

</div>

<?
}
?>