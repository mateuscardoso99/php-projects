<?php
	require_once("../vendor/autoload.php");
	
	use App\Controllers\TurmaController;

	if(isset($_GET['id'])){
		$turmaController = new TurmaController();
		$turmaController->delete($_GET['id']);
	}
	else{
		header("Location: dashboard.php");
	}

?>