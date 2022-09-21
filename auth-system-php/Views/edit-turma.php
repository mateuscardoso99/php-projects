<?php 
	require_once("../vendor/autoload.php");

	use App\Controllers\TurmaController;

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE){
		header("Location: index.php");
		exit;
	}

	if(isset($_SESSION['loggedin']) && is_null($_SESSION['email_verified_at'])){
		header("Location: redirect-email-verification.php");
		exit;
	}


	if (isset($_GET['id'])) {
		$turmaController = new TurmaController();
		$turma = $turmaController->show($_GET['id']);

		if(!$turma){
			$_SESSION['error'] = "Turma inválida";
			header("Location: dashboard.php");
			exit;
		}
		else{ ?>

			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel="stylesheet" type="text/css" href="css/styles.css">
					<title>Editar turma</title>
				</head>
				<body>
					<?php include_once("header.php") ?>

					<div class="container">
						<div class="form-container">
							<h1>Editar turma <?php echo utf8_encode($turma['disciplina']) ?></h1>
							<form action="turma.php" method="post">
								<input type="hidden" name="id" value="<?php echo $turma['id'] ?>">

								<div class="field">
									<label>Código</label>
									<input type="text" name="code" value="<?php echo $turma['codigo'] ?>">
								</div>

								<div class="field">
									<label>Disciplina</label>
									<input type="text" name="disciplina" value="<?php echo utf8_encode($turma['disciplina']) ?>">
								</div>

								<div class="field">
									<button type="submit" class="btn-submit" name="update_turma">
										SALVAR
									</button>
								</div>
							</form>
						</div>
					</div>

					<script src="js/script.js"></script>
				</body>
			</html>

	<?php	}
	}
	else{
		echo "Turma inválida";
	}
?>