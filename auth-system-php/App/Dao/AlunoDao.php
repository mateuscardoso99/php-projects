<?php
	
	namespace App\Dao;

	use App\Database\DB;
	use App\Models\Aluno;
	use PDO;

	class AlunoDao{

		public function checkExits($id_aluno,$turma_id){
			$sql = "SELECT * FROM alunos WHERE id=? AND turma_id=?";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$id_aluno,PDO::PARAM_INT);
			$stmt->bindValue(2,$turma_id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function insert(Aluno $aluno){
			try {
				$sql = "INSERT INTO alunos (nome, matricula, turma_id, created_at, updated_at) VALUES (:nome, :matricula, :turma_id, :created_at, :updated_at)";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':nome',$aluno->getNome(),PDO::PARAM_STR);
				$stmt->bindValue(':matricula',$aluno->getMatricula(),PDO::PARAM_STR);
				$stmt->bindValue(':turma_id',$aluno->getTurma()->getId(),PDO::PARAM_INT);
				$stmt->bindValue(':created_at',$aluno->getCreatedAt());
				$stmt->bindValue(':updated_at',$aluno->getUpdatedAt());
				
				if($stmt->execute()){
					return true;
				}
				return false;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($aluno_id){
			try{
				$sql = "DELETE FROM alunos WHERE id = :id";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':id',$aluno_id,PDO::PARAM_INT);
				
				if($stmt->execute()){
					return true;
				}
				return false;
			}catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

	}



?>