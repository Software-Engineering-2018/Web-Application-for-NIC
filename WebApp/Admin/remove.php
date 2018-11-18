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
        <link rel="stylesheet" href="CSS/remove_client.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>NIC WI-FI - Dashboard</title>
	</head>
	<script language="javascript">
		function myfunction() {
			alert('logged out successfully');
			window.location = "logout.php";
		}
	</script>
	<body>
		<header>
	        <label id="inoc">iNOC</label>
	        <img id="logo2" src="../Resources/DigitalIndia-logo.png" alt="DigitalIndia-logo"/>
	        <img id="logo1" src="../Resources/NIC-logo2.png" alt="NIC-logo"/>
	        <img id="logotext" src="../Resources/NIC-txt.png" alt="NIC-logotxt"/>
	    </header>
	    <hr>
		<div class="side">
			<img src="../Resources/wifi-vector-blue.png" alt="Wifi img"/>
			<h2>Wi-Fi Management System</h2>
			<hr>
			<p><i class="fa fa-eye"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="dashboard.php">View Device(s)</a></p>
			<p><i class="fa fa-search" aria-hidden="true"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="search.php">Search</a></p>
			<p id="selected"><i class="fa fa-user-times"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="remove.php">Remove User(s)</a></p>
			<p><i class="fa fa-sign-out"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="logout.php" onclick="myfunction()">Logout</a></p>
		</div>
		<div class="main">
			<h2 style="padding: 20px; padding-left: 30px">Remove User(s):</h2>
			<table class="blueTable">
				<thead>
					<tr>
						<th>EMPLOYEE CODE</th>
						<th>NAME</th>
						<th>DESIGNATION</th>
						<th>USERNAME</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include('connection.php');
					$sel="select * from registration";
					$conn = openConnection();
					$row=mysqli_query($conn,$sel);
					while($each=mysqli_fetch_array($row))
					{
						$name=$each['name'];
						$designation=$each['designation'];
						$empcode=$each['empcode'];
						$user=$each['username'];

						echo "<tr>
						<td>$empcode</td>
						<td>$name</td>
						<td>$designation</td>
						<td>$user</td>
						<td><a href='removeinto.php?id=$user'>Delete</a></td>
							</tr>"; 
					}
					closeConnection($conn);
				?>
				</tbody>
			</table>
		</div>
		<hr>
	    <footer>
	        <p>&copy Copyright This site is designed, developed, hosted and maintained by National Informatics Centre,<br>
	        Ministry of Electronics & Information Technology, Government of India.</p>
	    </footer>
	</body>
</html>