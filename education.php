
<html>
<body>

<h2>Educational Videos</h2>

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i494f18_team46", "my+sql=i494f18_team46", "i494f18_team46");

// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT * FROM videos ORDER BY VideoID DESC");
$rownum = 0;

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
		if ($row['blind'] == 1)
		{
			$blind = "Yes";
		}
		else
		{
			$blind = "No";
		}
		
		if ($row['deaf'] == 1)
		{
			$deaf = "Yes";
		}
		else
		{
			$deaf = "No";
		}
		
		echo "<div style='text-align: center;'><div class='dogdiv'>";
		echo "<h5>" . $row['Title'] . "</h5></br>";
		if ($row['URL'])
			echo "<div align='center'><iframe style='border: 4px solid #CC748E; width: 50%; height: 400px;'; src='" . $row['URL'] . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>";
		echo "</br><div class='dogtable' style='font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: gray;'>";
		echo $row['Description'];
		echo "</div></div></div>";
		
		$rownum = $rownum + 1;
		
		if (mysqli_num_rows($result) != $rownum)
		{
			echo "</br></br>";
		}
		else
		{
			echo "</br>";
		}
	}
}

$con->close();
?>

</body>
</html>