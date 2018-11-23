<?php
include ('connection.php');
session_start();
$conn = openConnection();
$user = $_SESSION['user'];
if (!$user) {
	header('Location: login.html', true, 301);
	exit();
}
$id=$_GET['id'];
$delete="delete from registration where username='$id'";
$status= mysqli_query($conn,$delete);
if($status)
{
	closeConnection($conn);
	echo"<Script>alert('success');window.location='dashboard.php';</script>";
}
else
{
	echo "Fail: " . mysqli_error($conn);
	closeConnection($conn);
}
?>