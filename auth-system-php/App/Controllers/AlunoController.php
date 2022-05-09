<?php

	namespace App\Controllers;

	use App\Models\Aluno;
	use App\Dao\AlunoDao;

	class AlunoController{

		public function index($turma_id){
			$alunoDao = new AlunoDao();
			return $alunoDao->read($turma_id);
		}
	}

?>