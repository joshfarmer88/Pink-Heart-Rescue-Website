<?php
session_start();

$_SESSION["p"] = "home";

if (isset($_GET['loc']))
{
	$_SESSION["p"] = $_GET['loc'];
}
else
{
	$_SESSION["p"] = "login";
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="index.css">

<head>
<title>Pink Heart Rescue</title>
<link rel="shortcut icon" href="heartico.ico" />
</head>

<body>

<div class="header">
<div class="logo">
<img src="placeholderLogo.png" alt="Pink Heart Rescue" style="width: 90px; height: 90px;">
</div>

<h1>Pink Heart Rescue</h1>
<h3>A Double Merle rescue for blind, deaf, and disabled dogs</h3>

<div class="navigation" style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: white; font-weight: bold; text-align: center;">

<a href="index.php?loc=home"><div class="navbutton"><span id="ahead">MAIN SITE</span></div></a>

</div>
</div>

<div class="content">
<h2>Admin Panel</h2>

</br>

<div align="left">
<b>
<form method="GET" action="">
<button name="loc" type="submit" value="dogentry">Post Dog Information</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="viewAllApps">View Adoption Applications</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="dogUpload">Upload Adopted Dog Photo</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="videoentry">Post Educational Video</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="evententry">Post Event Announcement</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="blogentry">Post Blog Update</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="bookkeeping">View Bookkeeping Log</button>
</form>


<?php
session_start();

if (isset($_SESSION['username']))
{
?>

</br>
<form action="logout.php">
<button type="submit">Logout</button>
</form>

<?
}
?>

</div>
</b>

</br>
</br>

</br>

<div id="formspace">
<div class='para'>
<i>Once logged in, select one of the options above to add new content or to make changes to existing content.</i>
</div>
</br>
</br>
</br>
</div>

<?php
$location = $_SESSION["p"];
echo "<div id='pagecontent'>";

if (isset($_POST['username']))
{
	$mysqli = new mysqli("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
	
	if($mysqli->connect_errno) {
		exit();
	}
	
	$username = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);
	
	$sql = "SELECT * FROM admin WHERE name = '{$username}' LIMIT 1";
	$result = $mysqli->query($sql);
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		$username = $row['name'];
		$hashedpass = $row['password'];
	}
	
	if (!$result->num_rows == 1) {
		echo "<p style='text-align: center;'><br><i>Invalid username/password.</i></br></p>";
	} else {
		
		if(md5($password) == $hashedpass)
		{
			$_SESSION["username"] = $username;
		}
		else
		{
			echo "<p style='text-align: center;'><br><i>Invalid username/password.</i></br></p>";
		}
	}
}

if (isset($_SESSION['username']))
{
	include $location . '.php';
}
else
{
	include 'login.php';
}

echo "</div>";
?>

</div>

<div class="footer">
<p id="pwhite">2019 Pink Heart Rescue</p>
</div>

</body>
</html>