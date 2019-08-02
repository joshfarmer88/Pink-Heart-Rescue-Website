<h2>Pink Heart Rescue Blog</h2>

<?php
$con=mysqli_connect("db.soic.indiana.edu", "i494f18_team46", "my+sql=i494f18_team46", "i494f18_team46");

// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$result = mysqli_query($con,"SELECT * FROM blogPost ORDER BY postDate DESC LIMIT 10");
$rownum = 0;

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
		echo "<div style='text-align: center;'><div class='dogdiv'>";
		echo "<h5>" . $row['subject'] . "</h5></br>";
		if (file_exists("blogPics/" . str_replace(' ', '', $row['subject']) . ".jpg"))
			echo "<img src='blogPics/" . str_replace(' ', '', $row['subject']) . ".jpg' style='width: 25%; border: 4px solid #CC748E;'><br>";
		echo "</br><div class='dogtable' style='font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: gray;'>";
		echo "<p>" . nl2br($row['postBody']) . "</p>";
		echo "<p><br><i>Posted on " . date("F j, Y", strtotime($row['postDate'])) . " at " . date("h:i A", strtotime($row['postDate'])) . "</i></p>";
		
		if ($row['podcast'])
		{
			echo "</br><iframe style='align: center; border: 4px solid #CC748E; width: 45%; height: 300px;'; src='" . $row['podcast'] . "' align='center' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><br><br>";
		}
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