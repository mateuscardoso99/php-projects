<?php 
	require_once("../vendor/autoload.php");

	use App\Database\DB;

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
		header("Location: index.php");
		exit;
	}

	if(isset($_SESSION['loggedin']) && !is_null($_SESSION['email_verified_at'])){
		header("Location: dashboard.php");
		exit;
	}

	if(isset($_POST['email']) && isset($_POST['action']) && ($_POST['action'] == "send_link")){
		$token = bin2hex(random_bytes(30));

		$sql = "UPDATE users SET email_verification_token = ? WHERE email = ?";
		$stmt = DB::connection()->prepare($sql);
		$stmt->bindValue(1,$token);
		$stmt->bindValue(2,$_SESSION['email']);

		//send email
		//verify-email?token=1234

		if($stmt->execute()){
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['success'] = "link enviado com sucesso";
			header("Location: redirect-email-verification.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
		<title>Verificar E-mail</title>
	</head>
	<body>
		<?php include_once("header.php") ?>

		<?php 
			if(isset($_SESSION['success'])) { ?>
				<div class="success">
					<p><?php echo $_SESSION['success']?></p>
				</div>
		<?php } ?>
		
		<div class="errors">
			<p>Verifique seu email para poder logar</p>
		</div>

		<form action="" method="post">
			<input type="hidden" name="action" value="send_link">
			<input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
			<button type="submit" class="btn-email-verify" name="send-link">Enviar link</button>
		</form>

		<script src="js/script.js"></script>
	</body>
</html>