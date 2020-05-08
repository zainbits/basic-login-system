<?php 

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "basic-login-system-db";

	$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

	if (!$conn) {
		die("Connecion failed: ".mysqli_connect_error());
	}