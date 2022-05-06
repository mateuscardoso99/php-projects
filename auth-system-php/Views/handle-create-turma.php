<?php
	require_once("../vendor/autoload.php");
	
	use App\Controllers\TurmaController;

	if(isset($_POST['add_turma'])){
		$turmaController = new TurmaController();
		$turmaController->store($_POST);
	}
	else{
		header("Location: dashboard.php");
	}

?>