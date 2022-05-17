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

	$turmaController = new TurmaController();
	$turmas = $turmaController->index();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
		<title>Dashboard</title>
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
			<div class="row row-cols-md-2">
				<div class="column">
					<div class="turmas">
						<p><?php echo count($turmas)?></p>
						<h3>Turmas Cadastradas</h3>
					</div>
				</div>
				<div class="column">
					<div class="alunos">
						<p>5</p>
						<h3>Alunos</h3>
					</div>
				</div>
			</div>

			<div class="button-add-container">
				<button class="btn-add" onclick="openModal('modal-turma')">
					<strong>+</strong> Nova turma
				</button>
			</div>

			<table>
				<tr>
					<th>Cód.</th>
					<th>Disciplina</th>
					<th>Opções</th>
				</tr>
				
				<?php foreach($turmas as $turma){ ?>
					<tr>
						<td>
							<a href="detail-turma.php?id=<?php echo $turma['id'] ?>">
								<?php echo $turma['codigo']; ?>
							</a>
						</td>
						<td><?php echo $turma['disciplina']; ?></td>
						<td>
							<a href="edit-turma.php?id=<?php echo $turma['id'] ?>" class="btn-edit">EDITAR</a>
							<button type="button" onclick="deleteTurma('<?php echo $turma['id'] ?>')" class="btn-danger">APAGAR</button>
						</td>
					</tr>
				<?php } ?>
			</table>

			<div id="modal-turma" class="modal">
				<div class="modal-content form-container">
					<h1>Adicionar turma</h1>
					<span class="close" onclick="closeModal('modal-turma')">&times;</span>
					<form action="turma.php" method="post">
						<div class="field">
							<label>Código</label>
							<input type="text" name="code">
						</div>

						<div class="field">
							<label>Disciplina</label>
							<input type="text" name="disciplina">
						</div>

						<div class="field">
							<button type="submit" class="btn-submit" name="add_turma">SALVAR</button>
						</div>
					</form>
				</div>
			</div>

			<div id="modal-delete-turma" class="modal">
				<div class="modal-content">
					<span class="close" onclick="closeModal('modal-delete-turma')">&times;</span>
					<h3 class="title-delete">Deseja apagar essa turma?</h3>
					<a id="link-delete-turma" class="btn-danger">APAGAR</a>
				</div>
			</div>
		</div>
	

		<script src="js/script.js"></script>

		<script type="text/javascript">
			function deleteTurma(id){
				document.getElementById("link-delete-turma").href = `turma.php?id=${id}&action=delete`
				openModal('modal-delete-turma')
			}
		</script>
	</body>
</html>