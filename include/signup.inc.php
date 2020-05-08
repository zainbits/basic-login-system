<?php 
	if (isset($_POST['signup-submit'])) {

		require 'dbh.inc.php';

		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];

		if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
			header("Location: ../signup.php?error=emptyfields");
			exit();
		}

		else if ($password !== $passwordRepeat) {
			header("Location: ../signup.php?error=passwordcheck");
			exit();
		}

		else {
			$sql = "SELECT username FROM users WHERE username=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../signup.php?error=sqlError");
				exit();
			}
			else {

				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0) {
					header("Location: ../signup.php?usererror=usertaken");
					exit();
				}
				else {

					$sql = "INSERT INTO users (username, userEmail, userPwd) VALUES (?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../signup.php?error=sqlError");
						exit();
					}
					else {
						$passEncrypt = password_hash($password, PASSWORD_DEFAULT);

						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passEncrypt);
						mysqli_stmt_execute($stmt);
						header("Location: ../signup.php?signup=success");
						exit();
					}
				} 
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

	}
	else {
		header("Location: ../signup.php");
		exit();
	}