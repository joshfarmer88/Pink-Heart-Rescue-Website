<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<div class='para'>

<b>Video Post Form</b>
<br>
<br>

<i>Which video post would you like to make changes to?</i>
<br>
<br>

<form action="?loc=videoentry" method="POST">
	<select name="video" id="video" onchange="this.form.submit()">
	<option value="new">New Video</option>

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

$sql="SELECT * FROM videos";

$result = $con->query($sql);

while($row = $result->fetch_assoc()) 
{
    echo "<option value='" . $row["Title"] . "'>" . $row["Title"] . "</option>";
}

?>

</select>

</form>

<?php

if ($_POST["video"] != "")
{
	$sql = "SELECT * FROM videos WHERE Title = '" . $_POST["video"] . "'";
	
	$result = $con->query($sql);

	while($row = $result->fetch_assoc()) 
	{
		$Title = $row["Title"];
		$Description = $row["Description"];
		$URL = $row["URL"];
		
	}
}
elseif ($_POST["video"] == "New Post")
{
	$Title = "";
	$Description = "";
	$URL = "";
	
}

?>

<br>
<br>
<br>

<form action="insertVideo.php" method="POST" enctype="multipart/form-data">

<i>Enter all information applicable to the Video Post.</i>
<br>
<br>
<br>

<b>Video Details</b>
<br>
<br>

Video Title:
<br>
<input type="text" name="Title" value="<?php echo $Title;?>">
<br>
<br>

Video Description:
<br>
<textarea name="Description" style="height:200px; resize: none;"><?php echo $Description;?></textarea>
<br>
<br>

Video URL:
<br>
<input type="text" name="URL" value="<?php echo $URL;?>">
<br>
<br>


<i>When finished, click <b>Save</b> below to save this video's information to the records.</i>
<br>
<br>

<i>Or type <b>DELETE</b> (case sensitive) below and then press save to </b>permanently delete</b> the currently selected video from database.</i>
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