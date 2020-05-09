<?php 

if (isset($_POST['login-submit'])) {
	
	require 'dbh.inc.php';

	$UserMail = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($UserMail) || empty($password)) {
		header("Location: ../index.php?error=emptyFields");
		exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE UserUID=? OR UserEmail=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $UserMail, $UserMail);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['UserPwd']);
				if ($pwdCheck == false) {
					header("Location: ../index.php?error=wrongpass");
					exit();
				}
				else if ($pwdCheck == true) {
					session_start();
					$_SESSION['userid'] = $row['idUsers'];
					$_SESSION['userUID'] = $row['UserUID'];

					header("Location: ../index.php?login=success");
				}
			}
			else {
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}

}
else {
	header("Location: ../index.php");
	exit();
}