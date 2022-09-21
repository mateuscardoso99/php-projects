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

	if(isset($_POST['add_turma'])){
		$turmaController = new TurmaController();
		$turmaController->store($_POST);
	}
	elseif(isset($_POST['update_turma'])){
		$turmaController = new TurmaController();
		$turmaController->update($_POST);
	}
	elseif(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] = "delete"){
		$turmaController = new TurmaController();
		$turmaController->delete($_GET['id']);
	}
	else{
		header("Location: dashboard.php");
	}

?>