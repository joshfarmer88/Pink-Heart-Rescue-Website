<div class='para' style="text-align: center;">

<b>Administrator Login</b>
</br>
</br>

<?php 
session_start();

if (!isset($_SESSION['username']))
{
?>

<form action="admin.php" method="post" align="center">
<table align="center">
<tr>
<td><p>Username: </td><td></br><input name="username" type="text" maxlength="10"></p></td>
</tr>
<tr>
<td><p>Password: </td><td></br><input name="password" type="password" maxlength="20"></p></td>
</tr>
</table>
</br>
<td></td><td><input type="submit" value="Login"></td>
</form>

<?
} else {
echo "Welcome, Pink Heart Rescue " . $_SESSION['username'] . "!";
}
?>

</div>

</br>