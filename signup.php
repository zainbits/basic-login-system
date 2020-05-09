<?php 
require "header.php";
?>

<main>
	<h1>Signup</h1>
	<?php 
	if (isset($_GET["usererror"])) {
		if ($_GET["usererror"] == "usertaken") {
			echo '<h2>Sign up failed!!<br> Username already exist</h2>';
		}
		else if ($_GET["signup"] == "success") {
			echo '<h2> Signup Successfull</h2>';
		}
	}
	?>
	<form action="include/signup.inc.php" method="post">
		<input type="text" name="uid" placeholder="Username">
		<input type="text" name="mail" placeholder="E-mail">
		<input type="password" name="pwd" placeholder="password">
		<input type="password" name="pwd-repeat" placeholder="Repeat password">
		<button type="submit" name="signup-submit">Signup</button>
	</form>
</main>

<?php 
require "footer.php";
?>