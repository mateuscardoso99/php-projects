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
	
	use App\Controllers\AlunoController;

	if(isset($_POST['add_aluno'])){
		$alunoController = new AlunoController();
		$alunoController->store($_POST);
	}
	elseif(isset($_POST['delete_aluno'])){
		$alunoController = new AlunoController();
		$alunoController->delete($_POST['aluno_id'],$_POST['turma_id']);
	}
	else{
		header("Location: dashboard.php");
	}

?>