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
        <link rel="stylesheet" href="CSS/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>NIC WI-FI - Dashboard</title>
	</head>
	<script language="javascript">
		function myfunction() {
			alert('logged out successfully');
			window.location = "logout.php"
		}

		function show() {
			document.getElementById('hide_text').classList.toggle("hide_text");
		}
	</script>
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
			<p id="selected"><i class="fa fa-eye"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="dashboard.php">View Device(s)</a></p>
			<p><i class="fa fa-user-plus"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="add.php">Add Device</a></p>
			<p><i class="fa fa-pencil"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="modify.php">Modify Device Information</a></p>
			<p><i class="fa fa-user-times"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="remove.php">Remove Device(s)</a></p>
			<p><i class="fa fa-sign-out"></i>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="logout.php" onclick="myfunction()">Logout</a></p>
		</div>
		<div class="main">
			<h2 style="float: left; padding: 20px; padding-left: 30px">Device(s) Status:</h2>
			<h2 style="float: right; padding: 20px; padding-right: 30px">Welcome,
			<?php
			@include_once('connection.php');
			$conn = openConnection();

			$query = "select name from registration where username = '".$user."'";
			$result = mysqli_fetch_array(mysqli_query($conn, $query));
			echo $result['name'];
			
			closeConnection($conn);
			?></h2>
			<table class="blueTable">
				<thead>
					<tr>
					<th>DEVICE NAME</th>
					<th>MAC ADDRESS</th>
					<th>OS</th>
					<th>STATUS</th>
					<th>FROM</th>
					<th>TILL</th>
					<th>PASSWORD</th>
				</tr>
				</thead>
				<tbody>
					<?php
					include_once('connection.php');
					$sel="select * from devices where username='$user'";
					$conn = openConnection();
					$row=mysqli_query($conn,$sel);
					while($each=mysqli_fetch_array($row))
					{
						$device_name=$each['device_name'];
						$mac_address=$each['mac_address'];
						$os=$each['os'];
						$status=$each['status'];
						$from=$each['from_duration'];
						$till=$each['to_duration'];
						
						echo "<tr>
						<td>$device_name</td>
						<td>$mac_address</td>
						<td>$os</td>";
						if ($status === "pending") {
							$password=$each['password'];
							$search = substr($password, 0, 5);
							$password=str_replace($search, "", $password);
							echo "<td><span style='color:blue'>".ucfirst($status)."</span></td>";
							echo '<td>'.$from.'</td>
							<td>'.$till.'</td>
							<td id="hide_text" class="hide_text" onclick="show()" style="cursor: pointer;">'.$password.'</td>
							</tr>';
						}
						if ($status === "approved") {
							$password=$each['password'];
							$search = substr($password, 0, 5);
							$password=str_replace($search, "", $password);
							echo "<td><span style='color:green'>".ucfirst($status)."</span></td>";
							echo '<td>'.$from.'</td>
							<td>'.$till.'</td>
							<td id="hide_text" class="hide_text" onclick="show()" style="cursor: pointer;">'.$password.'</td>
							</tr>';
						} 
						if ($status === "declined") {
							$password=$each['password'];
							echo "<td><span style='color:red'>".ucfirst($status)."	</span></td>";
							echo '<td>'.$from.'</td>
							<td>'.$till.'</td>
							<td>'.$password.'</td>
							</tr>';
						} 
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