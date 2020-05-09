<?php 
require "header.php";
?>

<main>
	<div class="centered zbox">
		<?php 
		if (isset($_SESSION['userid'])) {
			echo '<p>you are logged in</p>';
		}
		else {
			echo '<p>you are logged out</p>';
		}
		?>
	</div>
</main>

<?php 
require "footer.php";
?> 