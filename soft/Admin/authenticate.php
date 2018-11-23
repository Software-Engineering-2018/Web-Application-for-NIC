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

	$hash = '$2y$10$yl9RsK86L2g16NnLhtmRpeQxxPbqiueG0GYBoX/HpVcESq0StEZdW';

	if ($user === "admin" && password_verify($pass, $hash)) {
		$_SESSION['user'] = $user;
		closeConnection($conn);
		header("Location: dashboard.php", true, 301);
		exit();
	}
	else {
		closeConnection($conn);
		echo "<script language = \"javascript\">alert('Invalid Credentials $pass $hash')</script>";
		echo "<script>setTimeout(\"location.href = 'login.html'\",20);</script>";
	}

}
else {
	header("Location: login.html", true, 301);
	exit();
}

?>