<?php
	namespace App\Controllers;

	use App\Models\Turma;
	use App\Validation\Validation;
	use App\Dao\TurmaDao;

	class TurmaController{

		public function __construct(){
			if(!isset($_SESSION)){
				session_start();
			}
		}

		public function index(){
			$turmaDao = new TurmaDao();
			return $turmaDao->read();
		}

		public function show(){

		}

		public function store($data){
			$validator = new Validation();
			$msg = $validator->check_empty($data,array('code','disciplina'));

			if($msg != null){
				$_SESSION['error'] = $msg;
				header("Location: dashboard.php");
				exit;
			}
			
			$turma = new Turma();
			$turma->setCodigo($data['code']);
			$turma->setDisciplina($data['disciplina']);
			$turma->setCreatedAt(date('Y-m-d H:i:s'));
			$turma->setUpdatedAt(date('Y-m-d H:i:s'));

			$turmaDao = new TurmaDao();

			if($turmaDao->insert($turma)){						
				$_SESSION['success'] = "Turma salva com sucesso";
			}
			else {
				$_SESSION['error'] = "Não foi possível salvar a turma";
			}

			header("Location: dashboard.php");
		}

		public function update(){

		}

		public function delete($id){
			$turmaDao = new TurmaDao();
			$checkExists = $turmaDao->checkExits($id);
			if(isset($checkExists['codigo'])){
				$turmaDao->delete($checkExists['id']);
				$_SESSION['success'] = "Turma excluida com sucesso";
				header("Location: dashboard.php");
			}
			else{
				$_SESSION['error'] = "Turma inválida";
				header("Location: dashboard.php");
			}
		}

	}

?>