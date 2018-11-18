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
        <link rel="icon" href="Resources/wifi.png">
        <link rel="stylesheet" href="CSS/add_client.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>NIC WI-FI - Dashboard</title>
		<script language="javascript">
			function myfunction() {
				alert('logged out successfully');
				window.location = "logout.php";
			}

			function valid() {
				if (!(/([0-9A-Z]{1,2}:){5}[0-9A-Z]{1,2}/.test(document.getElementById("mac").value))) {
					alert('Invalid MAC Address');
					document.getElementById("mac").value = "";
					return false;
				}
				else {
					return true;
				}
			}
		</script>
	</head>
	<body>
		<header>
	        <label id="inoc">iNOC</label>
	        <img id="logo2" src="Resources/DigitalIndia-logo.png" alt="DigitalIndia-logo">
	        <img id="logo1" src="Resources/NIC-logo2.png" alt="NIC-logo">
	        <img id="logotext" src="Resources/NIC-txt.png" alt="NIC-logotxt">
	    </header>
	    <hr>
		<div class="side">
			<img src="Resources/wifi-vector-blue.png" alt="Wifi img"/>
			<h2>Wi-Fi Management System</h2>
			<hr>
			<p><i class="fa fa-eye"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="dashboard.php">View Device(s)</a></p>
			<p id="selected"><i class="fa fa-user-plus"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="add.php">Add Device</a></p>
			<p><i class="fa fa-pencil"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="modify.php">Modify Device Information</a></p>
			<p><i class="fa fa-user-times"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="remove.php">Remove Device(s)</a></p>
			<p><i class="fa fa-sign-out"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="logout.php" onclick="myfunction()">Logout</a></p>
		</div>
		<div class="main">
			<h1 style="padding: 5px; padding-left: 30px; margin-top: 11.440px; text-align: center;">Add Device</h1>
			<form  action="addinto.php" method="post">
				<label>Device name :</label><br><input type="text" name="dname" placeholder="Enter device name" required /><br><br>
				<label>MAC Address :</label><br><input id="mac" type="text" name="daddress" placeholder="Enter device's MAC address" onchange="valid()" required /><br><br>
				<label>OS :</label><br><input type="text" name="dos" placeholder="What operating system" required /><br><br>
				<input type="submit" value="Add" 
				<?php
					include_once('connection.php');

					$conn = openConnection();

					$query = "select * from devices where username = '".$user."'";
					$count = mysqli_num_rows(mysqli_query($conn, $query));

					if ($count == 3) {
						echo 'disabled="true"';
					}
					closeConnection($conn);
					?>/>
			</form>
			<hr>
			<h2 style="margin: 0px; margin-left: 150px;"><u>Note</u></h2>
			<div id="note">
				<ul>
				<li>Only three devices per userID.</li>
				<li>NIC VPN is required for iPhone/iPad/MAC.</li>
				<li>Seperate form is available for requesting Certificate for Wi-Fi access that can be downloaded from website.</li>
				</ul>
			</div>
		</div>
		<hr>
	    <footer>
	        <p>&copy Copyright This site is designed, developed, hosted and maintained by National Informatics Centre,<br>
	        Ministry of Electronics & Information Technology, Government of India.</p>
	    </footer>
	</body>
</html>