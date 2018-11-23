<?php 
	session_start();
	if (session_destroy()) {
		session_unset();
		header('Location: login.html', true, 301);
		exit();
	}
	else {
		die("Error logging out");
	}
?>