<?php
	include_once('../controllers/news.php');

	if (isset($_POST['delete-news'])) {
		$news = new News();
		$news->delete($_POST['delete-news']);
	}

	if (isset($_POST['update-news'])) {
		$request = [
			'id' => $_POST['update-news'],
			'titulo' => $_POST['description'],
			'conteudo' => $_POST['content'],
			'id_categoria' => $_POST['category'] 
		];
		$news = new News();
		$news->update($request);
	}

	if (isset($_POST['description']) &&
		 isset($_POST['content']) &&
			isset($_POST['category']) && empty($_POST['update-news'])) {
		if (!empty($_POST['description']) &&
			 !empty($_POST['content']) &&
				!empty($_POST['category']) && is_numeric($_POST['category'])) {
			$request = [
				'titulo' => $_POST['description'],
				'conteudo' => $_POST['content'],
				'id_categoria' => $_POST['category'] 
			];
			$news = new News();
			$news->store($request);
		}
		else{
			session_start();
			$_SESSION['status'] = "Preencha os campos";
			header('Location:' .$_SERVER['HTTP_REFERER']);
		}
	}
?>