<?php 

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "MALWARE@v11";
	$dBName = "login_users_info";

	$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

	if (!$conn) {
		die("Connecion failed: ".mysqli_connect_error());
	}