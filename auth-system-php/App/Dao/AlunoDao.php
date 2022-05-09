<?php
	
	namespace App\Dao;

	use App\Database\DB;
	use App\Models\Aluno;
	use PDO;

	class AlunoDao{

		public function read($turma_id){
			$sql = "SELECT * FROM alunos JOIN turmas ON alunos.id = turmas.id WHERE turmas.id = ?";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$turma_id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function insert(Aluno $aluno){

		}

	}



?>