<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<div class='para'>

<b>Upload Adopted Dog Photo</b>
<br>
<br>

<form action="insertAdopted.php" method="POST" enctype="multipart/form-data">

<i>Select an image sent to you by an adopter via email below.</i>
<br>
<br>
<br>

Dog Image:
</br>
<input type="file" name="dogImage" id="dogImage">
</br>
</br>

<i>When finished, click <b>Upload</b> below to upload this image to the home page of the website.</i>
<br>
<br>


<input type="submit" value="Upload" name="submit">
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