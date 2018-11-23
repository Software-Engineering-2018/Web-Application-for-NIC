<?php

include('connection.php');
$conn= openconnection();
$rid=$_POST['rid'];
$device_name=$_POST['dname'];
$reason=$_POST['dreason'];
$update="update devices set to_duration='$to_duration',password='$reason', status='declined' where sno='$rid'";
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

