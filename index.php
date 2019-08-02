<?php
session_start();

$_SESSION["p"] = "home";

if (isset($_GET['loc']))
{
	$_SESSION["p"] = $_GET['loc'];
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="index.css">

<head>
<title>Pink Heart Rescue</title>
<link rel="shortcut icon" href="heartico.ico" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

<div class="header">
<div class="logo">
<img src="placeholderLogo.png" alt="Pink Heart Rescue" style="width: 90px; height: 90px;">
</div>

<h1>Pink Heart Rescue</h1>
<h3>A Double Merle rescue for blind, deaf, and disabled dogs</h3>

<div class="navigation" style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: white; font-weight: bold; text-align: center;">

<a href="?loc=home"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "home")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">HOME</span></div></a>

<a href="?loc=dogs"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "dogs" || $_SESSION["p"] == "adoptedDogs")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">DOGS</span></div></a>

<a href="?loc=education"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "education")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">EDUCATION</span></div></a>

<a href="?loc=events"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "events")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">EVENTS</span></div></a>

<a href="?loc=about"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "about")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">ABOUT</span></div></a>

<a href="?loc=contact"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "contact")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">CONTACT</span></div></a>

<a href="?loc=blog"><div class="navbutton" style="
<?php
if ($_SESSION["p"] == "blog")
{
	echo "background-color: #FF8FAF;";
}
else
{
	echo "background-color: #CC748E;";
}
?>
"><span id="ahead">BLOG</span></div></a>
</div>


</div>

<div class="content">
<?php
$location = $_SESSION["p"];
echo "<div id='pagecontent'>";
include $location . '.php';
echo "</div>";
?>	
</div>


<div class="footer">
<p id="pwhite">2019 Pink Heart Rescue</p>
</div>

</body>

</html>