<?php 
	require_once("../vendor/autoload.php");

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === TRUE){
		header("Location: dashboard.php");
		exit;
	}
	
	use App\Controllers\ResetPasswordController;

	if(isset($_POST['reset_password'])){
		$resetPasswordController = new ResetPasswordController();
		$resetPasswordController->sendLink($_POST);
	}
	else{
		header("Location: forgot-password.php");
	}

?>