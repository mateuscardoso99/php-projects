<?php

	namespace App\Controllers;

	use App\Models\Aluno;
	use App\Models\Turma;
	use App\Dao\AlunoDao;
	use App\Controllers\TurmaController;
	use App\Validation\Validation;

	class AlunoController{

		public function totalAlunos($user_id){
			$alunoDao = new AlunoDao();
			return $alunoDao->totalAlunos($user_id);
		}

		public function store($data){
			$validator = new Validation();
			$msg = $validator->check_empty($data,array('nome','matricula','turma_id'));

			if($msg != null){
				$_SESSION['error'] = $msg;
				header("Location: dashboard.php");
				exit;
			}

			$turmaController = new TurmaController();
			$get_turma = $turmaController->show($data['turma_id']);

			if ($get_turma === FALSE) {
				$_SESSION['error'] = "Turma inválida";
				header("Location: dashboard.php");
				exit;
			}

			$turma = new Turma();
			$turma->setId($get_turma['id']);
			$turma->setCodigo($get_turma['code']);
			$turma->setDisciplina($get_data['disciplina']);
			$turma->setCreatedAt($get_turma['created_at']);
			$turma->setUpdatedAt($get_turma['updated_at']);
			
			$aluno = new Aluno();
			$aluno->setNome($data['nome']);
			$aluno->setMatricula($data['matricula']);
			$aluno->setTurma($turma);
			$aluno->setCreatedAt(date('Y-m-d H:i:s'));
			$aluno->setUpdatedAt(date('Y-m-d H:i:s'));

			$alunoDao = new AlunoDao();

			if($alunoDao->insert($aluno)){						
				$_SESSION['success'] = "Aluno salvo com sucesso";
			}
			else {
				$_SESSION['error'] = "Não foi possível salvar a turma";
			}

			header("Location: detail-turma.php?id=".$data['turma_id']);
		}

		public function delete($aluno_id,$turma_id){
			$turmaController = new TurmaController();
			$turma = $turmaController->show($turma_id);

			if ($turma === FALSE) { 
				$_SESSION['error'] = "Turma inválida";
				header("Location: dashboard.php");
				exit;
			}

			$alunoDao = new AlunoDao();
			$checkExists = $alunoDao->checkExits($aluno_id,$turma['id']);

			if(isset($checkExists['nome'])){
				$alunoDao->delete($aluno_id);
				$_SESSION['success'] = "Aluno excluido com sucesso";
			}
			else{
				$_SESSION['error'] = "Aluno inválido";
			}
			
			header("Location: detail-turma.php?id=".$turma['id']);
		}
	}

?>