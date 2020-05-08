<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="This is an example. Show up in results.">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>MyLoginPage</title>
	<link rel="stylesheet" type="text/css" href="mycss.css">
</head>
<body>

	<header>
		<nav class="nav-bar">
			<a href="#">
				<img src="logo.png" alt="logo">
			</a>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About Me</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
	
			<div>
				<?php 
					if (isset($_SESSION['userid'])) {
						echo '<form action="include/logout.inc.php" method="post">
							<button type="submit" name="logout-submit">Logout</button>
						</form>';
					}
					else {
						echo '<form action="include/login.inc.php" method="post">
							<input type="text" name="mailuid" placeholder="Username/E-mail...">
							<input type="password" name="pwd" placeholder="Password...">
							<button type="submit" name="login-submit">Login</button>
						</form>
						<a href="signup.php">Signup</a>';
					}
				 ?>
				
			</div>	
		</nav>
	</header>

</body>
</html>