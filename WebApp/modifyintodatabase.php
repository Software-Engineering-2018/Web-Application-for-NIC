<?php

include('connection.php');
$conn= openconnection();
$rid=$_POST['rid'];
$device_name=$_POST['dname'];
$mac_address=$_POST['daddress'];
$os=$_POST['dos'];
$update="update devices set device_name='$device_name',mac_address='$mac_address',os='$os', from_duration=now(), to_duration='', password='', status='pending' where sno='$rid'";
$status=mysqli_query($conn,$update);

if($status)
	
	{
		echo" <Script> alert('success');
window.location='dashboard.php';

		</script> ";
	}
	else
	{
			echo" <Script> alert('fail');
window.location='dashboard.php';

		</script> ";
	}

?>

