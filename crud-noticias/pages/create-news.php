<?php
	include_once("../controllers/categorias.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<title>Home</title>
</head>
<body>
	<div class="container">
		<?php
			include_once('../public/header.php');
		?>
		<main>
			<form action="../config/processa.php" method="post">
				<?php
					session_start();
					if (isset($_SESSION['status'])){ ?>
						<h1><?php echo $_SESSION['status'] ?></h1>
				<?php }
					unset($_SESSION['status']);
				?>
				<div class="input-area">
					<label for="description">Descrição</label>
					<input type="text" name="description">
				</div>

				<div class="input-area">
					<label for="category">Categoria</label>
					<?php
						$categoria = new Categorias();
						$categorias = $categoria->show();
					?>
					<select name="category">
					<?php foreach ($categorias as $cat){ ?>
						<option value="<?php echo $cat['id']; ?>">
							<?php echo $cat['name']; ?>
						</option>
					<?php } ?>
					</select>
				</div>

				<div class="input-area">
					<label for="content">Conteúdo</label>
					<textarea name="content" rows="5"></textarea>
				</div>

				<button class="button-submit" type="submit">Cadastrar</button>
			</form>
		</main>
	</div>

	<?php
		include_once('../public/footer.php');
	?>

	<script type="text/javascript" src="../public/js/script.js"></script>
</body>
</html>