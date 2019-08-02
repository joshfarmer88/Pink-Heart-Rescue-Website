<h2>Events for Pink Heart Rescue</h2>

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i494f18_team46", "my+sql=i494f18_team46", "i494f18_team46");

// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT * FROM event WHERE dateAndTime > NOW() ORDER BY dateAndTime");
$rownum = 0;

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
		echo "<div style='text-align: center;'><div class='dogdiv'>";
		echo "<h5>" . $row['title'] . "</h5></br>";
		if (file_exists("eventPics/" . str_replace(' ', '', $row['title']) . ".jpg"))
			echo "<img src='eventPics/" . str_replace(' ', '', $row['title']) . ".jpg'" . "style='width:25%; border: 4px solid #CC748E;'>";
		echo "</br></br><div class='dogtable' style='font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: gray;'>";
		echo "<p><b>Date/Time: </b></br>" . date("F j, Y", strtotime($row['dateAndTime'])) . " at " . date("h:i A", strtotime($row['dateAndTime'])) . "</p>";
		echo "<p><b>Location: </b></br>" . $row['place'] . "</p>";
		echo "<p><b>Description: </b></br>" . $row['description'] . "</p>";
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