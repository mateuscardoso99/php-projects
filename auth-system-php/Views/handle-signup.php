<?php
	require_once("../vendor/autoload.php");

	use App\Controllers\RegisterController;

	if (isset($_POST['signup'])) {
		$registerController = new RegisterController();
		$registerController->store($_POST);
	}
	else{
		header("Location: signup.php");
	}	

?>