<?php 
	require_once("../vendor/autoload.php");

	if(!isset($_SESSION)){
		session_start();
	}

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
		header("Location: dashboard.php");
		exit;
	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reset password</title>
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
	</head>
	<body>
		<?php include_once("header.php") ?>

		<?php 
			if(!isset($_SESSION)){
				session_start();
			}
			
			if (isset($_SESSION['success'])) { ?>
				<div class="success">
					<p><?php echo $_SESSION['success']?></p>
				</div>
		<?php } unset($_SESSION['success']) ?>

		<?php if(isset($_SESSION['error'])) { ?>
				<div class="errors">
					<p><?php echo $_SESSION['error'] ?></p>
				</div>
		<?php } unset($_SESSION['error']) ?>

		<div class="form-container">
			<h1>Informe o email</h1>

			<form action="handle-forgot-password.php" method="post">
				<div class="field">
					<label>Email</label>
					<input type="email" name="email" placeholder="email">
				</div>

				<div class="field">
					<button type="submit" class="btn-submit" name="reset_password">Enviar link</button>
				</div>
			</form>
		</div>

		<script src="js/script.js"></script>
	</body>
</html>