<?php 
include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$conn = openConnection();

	#Storing and filtering of register form values	
	$fname = $_POST['fname'];
	$fname = filter_var($fname, FILTER_SANITIZE_STRING);
	$fname = stripslashes($fname);
	$fname = mysqli_real_escape_string($conn, $fname);

	$designation = $_POST['designation'];
	$designation= filter_var($designation, FILTER_SANITIZE_STRING);
	$designation = stripslashes($designation);
	$designation = mysqli_real_escape_string($conn, $designation);

	$empcode = $_POST['empcode'];
	$empcode = filter_var($empcode, FILTER_SANITIZE_STRING);
	$empcode = stripslashes($empcode);
	$empcode = mysqli_real_escape_string($conn, $empcode);

	$mobileno = $_POST['mobileno'];
	$mobileno = filter_var($mobileno, FILTER_SANITIZE_STRING);
	$mobileno = stripslashes($mobileno);
	$mobileno = mysqli_real_escape_string($conn, $mobileno);

	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_STRING);
	$email = stripslashes($email);
	$email = mysqli_real_escape_string($conn, $email);

	$nic_div = $_POST['nic_div'];
	$nic_div = filter_var($nic_div, FILTER_SANITIZE_STRING);
	$nic_div = stripslashes($nic_div);
	$nic_div = mysqli_real_escape_string($conn, $nic_div);

	$nic_loc = $_POST['nic_loc'];
	$nic_loc = filter_var($nic_loc, FILTER_SANITIZE_STRING);
	$nic_loc = stripslashes($nic_loc);
	$nic_loc = mysqli_real_escape_string($conn, $nic_loc);

	$nonic_dept = $_POST['nonic_dept'];
	$nonic_dept = filter_var($nonic_dept, FILTER_SANITIZE_STRING);
	$nonic_dept = stripslashes($nonic_dept);
	$nonic_dept = mysqli_real_escape_string($conn, $nonic_dept);

	$user = $_POST['user'];
	$user = filter_var($user, FILTER_SANITIZE_STRING);
	$user = stripslashes($user);
	$user = mysqli_real_escape_string($conn, $user);

	$pass = $_POST['pass'];
	$pass = filter_var($pass, FILTER_SANITIZE_STRING);
	$pass = stripslashes($pass);
	$salt = "$6$rounds=5000$NIC$";
	$pass = mysqli_real_escape_string($conn, crypt($pass, $salt));

	$cat = $_POST['cat'];
	$cat = filter_var($cat, FILTER_SANITIZE_STRING);
	$cat = stripslashes($cat);
	$cat = mysqli_real_escape_string($conn, $cat);

	#storing into table
	$sql = "INSERT INTO registration VALUES('".$fname."','".$designation."','".$empcode."',".$mobileno.",'".$email."','".$nic_div."','".$nic_loc."','".$nonic_dept."','".$user."','".$pass."','".$cat."')";

	if (!mysqli_query($conn, $sql)) {
		closeConnection($conn);
		echo "<script>alert(\"Registration failed: ".mysqli_error($conn)."\");</script>";
		echo "<script>setTimeout(\"location.href = 'login.html'\",20);</script>";
	}
	else {
		closeConnection($conn);
		echo "<script>alert(\"Successfully Registered.\");</script>";
		echo "<script>setTimeout(\"location.href = 'login.html'\",20);</script>";
	}
}
else {
	header("Location: login.html", true, 301);
	exit();
}

?>