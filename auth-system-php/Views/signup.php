<?php 
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
			<link rel="stylesheet" type="text/css" href="/css/styles.css">
			<title>Sign Up</title>
		</head>
		<body>
			<?php include_once("./header.php");?>

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
				<h1>Sign up</h1>

				<form action="handle-signup.php" method="post">
					<div class="field">
						<label>Nome</label>
						<input type="text" name="name" placeholder="nome">
					</div>

					<div class="field">
						<label>Email</label>
						<input type="email" name="email" placeholder="email">
					</div>

					<div class="field">
						<label>Senha</label>
						<input type="password" name="password" placeholder="senha">
					</div>

					<div class="field">
						<button type="submit" class="btn-submit" name="signup">Cadastrar</button>
					</div>
				</form>
			</div>
		</body>
</html>