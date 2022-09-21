<?php
	require_once("../vendor/autoload.php");

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

	use App\Controllers\TurmaController;

	if(isset($_GET['id'])){
		$turmaController = new TurmaController();
		$turma = $turmaController->show($_GET['id']);

		if(!$turma){
			$_SESSION['error'] = "Turma inválida";
			header("Location: dashboard.php");
			exit;
		}

		$alunos = $turmaController->getAlunosFromTurma($turma['id'])?>

		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="css/styles.css">
				<title><?php echo utf8_encode($turma['disciplina']) ?></title>
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

				<div class="container">
					<h1 class="title-detail">Turma <?php echo utf8_encode($turma['disciplina']) ?></h1>

					<div class="add-aluno">
						<h3>Alunos:</h3>
						<button class="btn-add" onclick="openModal('modal-aluno')">
							<strong>+</strong> Novo aluno
						</button>
					</div>

					<table>
						<tr>
							<th>Nome</th>
							<th>Matrícula</th>
							<th>Opções</th>
						</tr>
						<?php 
							if(count($alunos)==0){?>
								<h2>Nenhum aluno cadastrado</h2>
						<?php } else { 
							foreach($alunos as $aluno) {?>
								<tr>
									<td><?php echo $aluno['nome'] ?></td>
									<td><?php echo $aluno['matricula'] ?></td>
									<td>
										<button 
											type="button" 
											onclick="deleteAluno(
												'<?php echo $aluno['nome']?>',
												'<?php echo $aluno['id']?>',
												'<?php echo $turma['id']?>'
											)" 
											class="btn-danger"
										>
											APAGAR
										</button>
									</td>
								</tr>
						<?php }} ?>
					</table>

					<div id="modal-aluno" class="modal">
						<div class="modal-content form-container">
							<h1>Adicionar aluno</h1>
							<span class="close" onclick="closeModal('modal-aluno')">&times;</span>
							<form action="aluno.php" method="post">
								<input type="hidden" name="turma_id" value="<?php echo $turma['id']?>">

								<div class="field">
									<label>Nome</label>
									<input type="text" name="nome">
								</div>

								<div class="field">
									<label>Matrícula</label>
									<input type="text" name="matricula">
								</div>

								<div class="field">
									<button type="submit" class="btn-submit" name="add_aluno">SALVAR</button>
								</div>
							</form>
						</div>
					</div>

					<div id="modal-delete-aluno" class="modal">
						<div class="modal-content">
							<span class="close" onclick="closeModal('modal-delete-aluno')">
								&times;
							</span>

							<h3 id="modal-delete-nome-aluno" class="title-delete"></h3>

							<form action="aluno.php" method="post">
								<input id="aluno_id" type="hidden" name="aluno_id">
								<input id="turma_id" type="hidden" name="turma_id">
								<button type="submit" class="btn-danger" name="delete_aluno">
									APAGAR
								</button>
							</form>
						</div>
					</div>
				</div>

				<script src="js/script.js"></script>

				<script type="text/javascript">
					function deleteAluno(nome_aluno,aluno_id,turma_id){
						document.querySelector("#modal-delete-nome-aluno").innerText = `Deseja apagar o aluno ${nome_aluno}?`
						document.querySelector("#aluno_id").value = aluno_id
						document.querySelector("#turma_id").value = turma_id
						openModal('modal-delete-aluno')
					}
				</script>
			</body>
		</html>

	<?php
	}
	else{
		header("Location: dashboard.php");
	}
?>