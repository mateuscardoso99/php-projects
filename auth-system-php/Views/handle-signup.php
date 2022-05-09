<?php
	require_once("../vendor/autoload.php");

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === TRUE){
		header("Location: dashboard.php");
		exit;
	}
	
	use App\Controllers\RegisterController;

	if (isset($_POST['signup'])) {
		$registerController = new RegisterController();
		$registerController->store($_POST);
	}
	else{
		header("Location: signup.php");
	}	

?>