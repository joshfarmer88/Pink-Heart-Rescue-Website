<?php
session_start();

if (isset($_SESSION['username']))
{
?>

<?php
$con=mysqli_connect("db.soic.indiana.edu","i494f18_team46","my+sql=i494f18_team46", "i494f18_team46");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

if (!$result = mysqli_query($con,"SELECT applicationID, name, dog, email, phone, submitDate, approved FROM application"))
{
    die("Error: " . mysqli_error($con));
}
?>
<div class='para'>
<table border='1'>
<tr>
<th>Application ID</th>
<th>Applicant Name</th>
<th>Dog</th>
<th>Applicant Email</th>
<th>Applicant Phone</th>
<th>Submission Date</th>
<th>Application Status</th>
<th></th>
</tr>

<?php
while($row = mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row['applicationID']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['dog']; ?></td>
<td><?php echo $row['email']; ?></td>

<td><?php echo "(". substr($row['phone'], 0, 3) .") ". substr($row['phone'], 3, 3) ."-". substr($row['phone'], 6, 4);?></td>

<td><?php echo date("M j, Y", strtotime($row['submitDate']));?></td>

<td><?php
if($row['approved'] == 1)
	echo "Approved";
else if($row['approved'] == -1)
	echo "Denied";
else
	echo "Pending";?></td>

<td><a href="?loc=viewApp&applicationID=<?php echo $row['applicationID']; ?>">View Application</a></td>
</tr>
<?php
}
mysqli_close($con);
?>
</table>
</div>

</br>

<?
}
?>