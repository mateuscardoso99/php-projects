<?php
	require_once("../vendor/autoload.php");

	if(!isset($_SESSION)){
		session_start();
	}

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE){
		header("Location: dashboard.php");
		exit; //interrompe a execução
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
	</head>

	<body>
		<?php include_once("header.php");?>		

		<?php 
			if(!isset($_SESSION)){
				session_start();
			}
			
			if(isset($_SESSION['error'])) { ?>
				<div class="errors">
					<p><?php echo $_SESSION['error']?></p>
				</div>
		<?php } unset($_SESSION['error'])?>

		<div class="form-container">
			<h1>Login</h1>

			<form action="handle-login.php" method="post">
				<div class="field">
					<label>Email</label>
					<input type="email" name="email">
				</div>

				<div class="field">
					<label>Senha</label>
					<input type="password" name="password">
				</div>

				<div class="field">
					<a class="link" href="forgot-password.php">Esqueci minha senha</a>
					<button type="submit" class="btn-submit" name="login">Entrar</button>
				</div>
			</form>
		</div>

		<script src="js/script.js"></script>
	</body>
</html>