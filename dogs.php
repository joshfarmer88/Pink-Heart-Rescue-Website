
<html>
<body>

<h2>Library of Available Dogs</h2>
<form method="GET" action="">
<button name="loc" type="submit" value="dogs">Available Dogs</button>
</form>
</br>
<form method="GET" action="">
<button name="loc" type="submit" value="adoptedDogs">Adopted Dogs</button>
</form>
</br>
<?php
$con=mysqli_connect("db.soic.indiana.edu", "i494f18_team46", "my+sql=i494f18_team46", "i494f18_team46");

// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT * FROM dog WHERE adopterName='' ORDER BY postDate");
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
		echo "<img src='dogPics/" . $row['Name'] . ".jpg' alt='" . $row['Name'] . "'style='width:25%; border: 4px solid #CC748E;'>";
		echo "<h4>" . $row['Name'] . "</h4></br>";
		echo "<div class='dogtable'>";
		echo "<p><b>Gender: </b></br>" . $row['Gender'] . "</p>";
		echo "<p><b>Date of Birth: </b></br>" . date("F j, Y", strtotime($row['DoB'])) . "</p>";
		echo "<p><b>Breed: </b></br>" . $row['Breed'] . "</p>";
		echo "<p><b>Blind: </b></br>" . $blind . "</p>";
		echo "<p><b>Deaf: </b></br>" . $deaf . "</p>";
		echo "<p><b>Other Disabilities: </b></br>" . $row['disabilities'] . "</p>";
		echo "<p><b>Biography: </b></br>" . $row['Bio'] . "</p>";
		echo "</div></br></br></br>";
		
		echo "<a style='font-family: Arial, Helvetica, sans-serif; font-size: 24px; font-weight: bold; color: gray; background-color: #D3D3D3; padding: 10px; border: 2px solid gray; width: 200px; height: 57px; text-decoration: none; align: center;' href='http://cgi.sice.indiana.edu/~team46/final/?loc=application&dogName=" . $row['Name'] . "'>Apply to Adopt " . $row['Name'] . "!</a>";
				
		echo "</div></div>";
		
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