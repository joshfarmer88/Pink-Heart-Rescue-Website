<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<div class='para'>

<b>Blog Post Form</b>
<br>
<br>

<i>Which blog post would you like to make changes to?</i>
<br>
<br>

<form action="?loc=blogentry" method="POST">
	<select name="blog" id="blog" onchange="this.form.submit()">
	<option value="new">New Post</option>

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

$sql="SELECT * FROM blogPost";

$result = $con->query($sql);

while($row = $result->fetch_assoc()) 
{
    echo "<option value='" . $row["subject"] . "'>" . $row["subject"] . "</option>";
}

?>

</select>

</form>

<?php

if ($_POST["blog"] != "")
{
	$sql = "SELECT * FROM blogPost WHERE subject = '" . $_POST["blog"] . "'";
	
	$result = $con->query($sql);

	while($row = $result->fetch_assoc()) 
	{
		$subject = $row["subject"];
		$postBody = $row["postBody"];
		$podcast = $row["podcast"];
	}
}
elseif ($_POST["blog"] == "New Post")
{
	$subject = "";
	$postBody = "";
	$podcast = "";
}

?>

<br>
<br>
<br>

<form action="insertBlog.php" method="POST" enctype="multipart/form-data">

<i>Enter all information applicable to the Blog Post.</i>
<br>
<br>
<br>

<b>Blog Details</b>
<br>
<br>

Blog Subject:
<br>
<input type="text" name="subject" value="<?php echo $subject;?>">
<br>
<br>


Blog Body:
<br>
<textarea name="postBody" style="height:200px; resize: none;"><?php echo $postBody;?></textarea>
<br>
<br>

Podcast URL:
<br>
<input type="text" name="podcast" value="<?php echo $podcast;?>">
<br>
<br>

Blog Image:
<br>
<input type="file" name="blogImage" id="blogImage">
<br>
<br>


<i>When finished, click <b>Save</b> below to save this blog's information to the records.</i>
<br>
<br>

<i>Or type <b>DELETE</b> (case sensitive) below and then press save to </b>permanently delete</b> the currently selected blog from database.</i>
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