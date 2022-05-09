<?php 
	require_once("../vendor/autoload.php");

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === TRUE){
		header("Location: dashboard.php");
		exit;
	}

	use App\Controllers\LoginController;

	if(isset($_POST['login'])){
		$loginController = new LoginController();
		$loginController->login($_POST);
	}
	else{
		header("Location: index.php");
	}

?>