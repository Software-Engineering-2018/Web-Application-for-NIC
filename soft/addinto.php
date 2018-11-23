<?php
include ('connection.php');
session_start();
$conn = openConnection();
$user = $_SESSION['user'];
if (!$user) {
	header('Location: login.html', true, 301);
	exit();
}

$device_name=$_POST['dname'];
$mac_address=$_POST['daddress'];
$os=$_POST['dos'];
$status="pending";

$query_dupli = "select mac_address from devices where username ='".$user."'";
$row = mysqli_query($conn, $query_dupli);

while ($each = mysqli_fetch_array($row)) {
	if ($each['mac_address'] === $mac_address) {
		closeConnection($conn);
		$flag = 1;
		echo "<script>alert('Device Already Exists');window.location='add.php'</script>";
	}
}

if ($flag != 1) {
	$query= "insert into devices(username,device_name,mac_address,os,status,from_duration,to_duration) values('$user','$device_name','$mac_address','$os','$status',now(),'')";
	$status= mysqli_query($conn,$query);
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
}
?>