<?php 
	require_once("../vendor/autoload.php");

	use App\Controllers\LoginController;

	if(isset($_POST['login'])){
		$loginController = new LoginController();
		$loginController->login($_POST);
	}
	else{
		header("Location: index.php");
	}

?>