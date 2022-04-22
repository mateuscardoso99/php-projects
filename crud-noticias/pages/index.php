<?php
	include_once("../config/processa.php");
	include_once('../public/header.php');
	include_once("../controllers/categorias.php");
?>

<?php
	if (!empty($_GET['search'])) {
		$news = new News();
		$noticias = $news->show($_GET['search']);
	}else{
		$news = new News();
		$noticias = $news->show();
	}
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
			session_start();
			if (isset($_SESSION['status'])){ ?>
				<h1 style="text-align: center;"><?php echo $_SESSION['status'] ?></h1>
		<?php }
			unset($_SESSION['status']);
		?>
		<main>
			<div class="row">
				<?php if (!$noticias) { ?>
					<h1>Nenhuma noticia encontrada.</h1>
				<?php } else {
					foreach ($noticias as $n) { ?>
						<div class="card">
							<h1><?php echo $n['title']; ?></h1>
							<p><?php echo $n['content']; ?></p>
							<form action="../config/processa.php" method="post">
								<input type="hidden" name="delete-news" value="<?php echo $n['nid']; ?>">
								<button type="submit">Apagar</button>
							</form>
							<button type="button" onclick="openMenu('update<?php echo $n['nid']; ?>')">Atualizar</button>
						</div>

						<div id="update<?php echo $n['nid']; ?>" class="modal">
							<form action="../config/processa.php" method="post">
								<input type="hidden" name="update-news" value="<?php echo $n['nid']; ?>">
								<div class="input-area">
									<label for="description">Descrição</label>
									<input type="text" name="description" value="<?php echo $n['title']; ?>">
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
									<textarea name="content" rows="5"><?php echo $n['content']; ?></textarea>
								</div>
								<button type="submit">Atualizar</button>
								<button type="button" onclick="openMenu('update<?php echo $n['nid']; ?>')">Cancelar</button>>
							</form>
						</div>

					<?php } ?>
				<?php } ?>
			</div>
		</main>
	</div>

	<?php
		include_once('../public/footer.php');
	?>

	<script type="text/javascript" src="../public/js/script.js"></script>
</body>
</html>