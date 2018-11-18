<?php

include('connection.php');
$conn= openconnection();
$rid=$_POST['rid'];
$device_name=$_POST['dname'];
$to_duration=$_POST['dtime'];
$pass=$_POST['dpass'];
$update="update devices set to_duration='$to_duration',password='$pass', status='approved' where sno='$rid'";
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

