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
					<div class="dropdown">
						<button class="dropdown-btn" onclick="dropdown()">
							<?php echo htmlspecialchars($_SESSION['name']) ?>
							<span class="dropdown-icon"></span>
						</button>
						<div id="dropdown" class="dropdown-content">
				    		<a href="logout.php">Sair</a>
				  		</div>
					</div>
				</li>
		<?php 
			}
		?>
	</ul>
</nav>