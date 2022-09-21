<?php
	namespace App\Controllers;

	use App\Models\User;
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

		public function getAlunosFromTurma($id){
			$turmaDao = new TurmaDao();
			return $turmaDao->getAlunosFromTurma($id);
		}

		public function show($id){
			$turmaDao = new TurmaDao();
			return $turmaDao->checkExits($id);
		}

		public function store($data){
			$validator = new Validation();
			$msg = $validator->check_empty($data,array('code','disciplina'));

			if($msg != null){
				$_SESSION['error'] = $msg;
				header("Location: dashboard.php");
				exit;
			}

			$user = new User(
				$_SESSION['user_id'],
				$_SESSION['name'],
				$_SESSION['email'],
				$_SESSION['password'],
				$_SESSION['email_verified_at'],
				$_SESSION['email_verification_token'],
				$_SESSION['remember_token'],
				$_SESSION['created_at']
			);
			
			$turma = new Turma();
			$turma->setCodigo($data['code']);
			$turma->setDisciplina($data['disciplina']);
			$turma->setUser($user);
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

		public function update($data){
			$turmaDao = new TurmaDao();
			$checkExists = $turmaDao->checkExits($data['id']);

			if(!$checkExists['codigo']){
				$_SESSION['error'] = "Turma inválida";
				header("Location: dashboard.php");
				exit;
			}

			$turma = new Turma();
			$turma->setId($data['id']);
			$turma->setCodigo($data['code']);
			$turma->setDisciplina($data['disciplina']);
			$turma->setCreatedAt($checkExists['created_at']);
			$turma->setUpdatedAt(date('Y-m-d H:i:s'));

			if($turmaDao->update($turma)){
				$_SESSION['success'] = "Turma atualizada com sucesso";	
			}
			else{
				$_SESSION['error'] = "Não foi possível atualizar a turma";
			}
			
			header("Location: dashboard.php");

		}

		public function delete($id){
			$turmaDao = new TurmaDao();
			$checkExists = $turmaDao->checkExits($id);

			if(isset($checkExists['codigo'])){
				$turmaDao->delete($checkExists['id']);
				$_SESSION['success'] = "Turma excluida com sucesso";
			}
			else{
				$_SESSION['error'] = "Turma inválida";
			}
			header("Location: dashboard.php");
		}

	}

?>