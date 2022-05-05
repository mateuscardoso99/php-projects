<?php 
	if (!isset($_SESSION)) {
		session_start();
	}
?>

<nav>
	<ul>
		<?php 
			if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) { 
		?>
				<li>
					<a href="./index.php">LOGIN</a>
				</li>
				<li>
					<a href="./signup.php">SIGN UP</a>
				</li>
		<?php 
			}
			else{
		?>
				<li>
					<a href="logout.php">SAIR</a>
				</li>
		<?php 
			}
		?>
	</ul>
</nav>