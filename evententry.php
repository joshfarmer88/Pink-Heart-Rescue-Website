<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<div class='para'>

<b>Event Form</b>
<br>
<br>

<i>Which event would you like to make changes to?</i>
<br>
<br>

<form action="?loc=evententry" method="POST">
	<select name="events" id="events" onchange="this.form.submit()">
	<option value="new">New Event</option>

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

$sql="SELECT * FROM event";

$result = $con->query($sql);


while($row = $result->fetch_assoc()) 
{
    echo "<option value='" . $row["title"] . "'>" . $row["title"] . "</option>";
}

?>

</select>

</form>

<?php

if ($_POST["events"])
{
	$sql = "SELECT * FROM event WHERE title = '" . $_POST["events"] . "'";
	
	
	$result = $con->query($sql);
	
	while($row = $result->fetch_assoc()) 
	{
		$title = $row["title"];
		$place = $row["place"];
		$dateAndTime = $row["dateAndTime"];
		$description = $row["description"];
		
	}
}
elseif ($_POST["events"] == "New Event")
{
	$title = "";
	$place = "";
	$dateAndTime = "";
	$description = "";
	
}

?>

<br>
<br>
<br>

<form action="insertEvent.php" method="POST" enctype="multipart/form-data">

<i>Enter all information applicable to the Event Post.</i>
<br>
<br>
<br>

<b>Event Details</b>
<br>
<br>

Event Title:
<br>
<input type="text" name="title" value="<?php echo $title;?>">
<br>
<br>

Event Image:
</br>
<input type="file" name="eventImage" id="eventImage">
</br>
</br>

Place:
<br>
<input type="text" name="place" value="<?php echo $place;?>">
<br>
<br>

Event Date and Time:
<br>
<input type="datetime-local" autofocus name="dateAndTime" value="<?php echo $dateAndTime;?>"> Current Date/Time Set: <?php echo date("F j, Y", strtotime($dateAndTime)) . " at " . date("h:i A", strtotime($dateAndTime));?>
<br>
<br>

Description:
<br>
<textarea name="description" style="height:200px; resize: none;"><?php echo $description;?></textarea>
<br>
<br>

<i>When finished, click <b>Save</b> below to save this event's information to the records.</i>
<br>
<br>

<i>Or type <b>DELETE</b> (case sensitive) below and then press save to </b>permanently delete</b> the currently selected event from database.</i>
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