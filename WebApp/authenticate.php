<?php 
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$conn = openConnection();

	$user = $_POST['user'];
	$user = filter_var($user, FILTER_SANITIZE_STRING);
	$user = stripslashes($user);
	$user = mysqli_real_escape_string($conn, $user);

	$pass = $_POST['pass'];
	$pass = filter_var($pass, FILTER_SANITIZE_STRING);
	$pass = stripslashes($pass);
	$pass = mysqli_real_escape_string($conn, $pass);

	$sql = "SELECT * FROM registration WHERE username = '".$user."'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	$sql = "SELECT password FROM registration where username = '".$user."'";
	$result = mysqli_query($conn, $sql);

	$each=mysqli_fetch_array($result);

	if ($count === 1 && password_verify($pass, $each['password'])) {
		$_SESSION['user'] = $user;
		closeConnection($conn);
		header("Location: dashboard.php", true, 301);
		exit();

	}
	else {
		closeConnection($conn);
		echo "<script language = \"javascript\">alert('Invalid Credentials')</script>";
		echo "<script>setTimeout(\"location.href = 'login.html'\",20);</script>";
	}

}
else {
	header("Location: login.html", true, 301);
	exit();
}

?>