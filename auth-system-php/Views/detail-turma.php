<?php
	require_once("../vendor/autoload.php");

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
		header("Location: index.php");
		exit;
	}

	if(isset($_SESSION['loggedin']) && is_null($_SESSION['email_verified_at'])){
		header("Location: redirect-email-verification.php");
		exit;
	}

	use App\Controllers\TurmaController;
	use App\Controllers\AlunoController;

	if(isset($_GET['id'])){
		$turmaController = new TurmaController();
		$turma = $turmaController->show($_GET['id']);

		if(!$turma){
			$_SESSION['error'] = "Turma inválida";
			header("Location: dashboard.php");
			exit;
		}

		$alunoController = new AlunoController();
		$alunos = $alunoController->index($turma['id'])?>

		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="css/styles.css">
				<title><?php echo $turma['disciplina'] ?></title>
			</head>
			<body>
				<?php include_once("header.php") ?>

				<div class="container">
					<h1 class="title-detail">Turma <?php echo $turma['disciplina'] ?></h1>

					<h3>Alunos:</h3>

					<table>
						<tr>
							<th>Nome</th>
							<th>Matrícula</th>
						</tr>
						<?php foreach($alunos as $aluno) {?>
							<tr>
								<td><?php echo $aluno['nome'] ?></td>
								<td><?php echo $aluno['matricula'] ?></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</body>
		</html>

	<?php
	}
	else{
		header("Location: dashboard.php");
	}
?>