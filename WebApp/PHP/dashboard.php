<?php

session_start();

$user = $_SESSION['user'];

if (!$user) {
	header('Location: login.html', true, 301);
	exit();
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="icon" href="../Resources/wifi.png">
        <link rel="stylesheet" href="../CSS/dashboard.css">
        <title>NIC WI-FI - Dashboard</title>
	</head>
	<script language="javascript">
		function myfunction() {
			alert('logged out successfully');
			window.location = "logout.php"
		}
	</script>
	<body>
		<header>
	        <label id="inoc">iNOC</label>
	        <img id="logo2" src="../Resources/DigitalIndia-logo.png" alt="DigitalIndia-logo">
	        <img id="logo1" src="../Resources/NIC-logo2.png" alt="NIC-logo">
	        <img id="logotext" src="../Resources/NIC-txt.png" alt="NIC-logotxt">
	    </header>
	    <hr>
		<div class="side">
			<p id="selected"><a href="#">View Device(s)</a></p>
			<p><a href="#">Add Device(s)</a></p>
			<p><a href="#">Modify Device Information</a></p>
			<p><a href="#">Remove Device(s)</a></p>
			<p><a href="logout.php">Logout</a></p>
		</div>
		<div class="main">
		</div>
		<hr>
	    <footer>
	        <p>&copy Copyright This site is designed, developed, hosted and maintained by National Informatics Centre,<br>
	        Ministry of Electronics & Information Technology, Government of India.</p>
	    </footer>
	</body>
</html>