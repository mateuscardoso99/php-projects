<?php 
	require_once("../vendor/autoload.php");

	use App\Controllers\ResetPasswordController;

	if(isset($_POST['reset_password'])){
		$resetPasswordController = new ResetPasswordController();
		$resetPasswordController->sendLink($_POST);
	}
	else{
		header("Location: forgot-password.php");
	}

?>