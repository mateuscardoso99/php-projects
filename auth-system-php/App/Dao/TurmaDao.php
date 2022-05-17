<?php
	namespace App\Dao;

	use App\Models\Turma;
	use App\Database\DB;
	use PDO;

	class TurmaDao{

		public function read(){
			$sql = "SELECT * FROM turmas WHERE user_id=? ORDER BY id ASC";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$_SESSION['user_id'],PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function getAlunosFromTurma($id){
			$sql = "SELECT alunos.* FROM turmas JOIN alunos ON alunos.turma_id = turmas.id WHERE turmas.id = ?";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function checkExits($id){
			$sql = "SELECT * FROM turmas WHERE id=? AND user_id=?";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$id,PDO::PARAM_INT);
			$stmt->bindValue(2,$_SESSION['user_id'],PDO::PARAM_INT); 
			$stmt->execute();
			return $stmt->fetch();
		}

		public function insert(Turma $turma){
			try {
				$sql = "INSERT INTO turmas (codigo, disciplina, user_id, created_at, updated_at) VALUES (:codigo, :disciplina, :user_id, :created_at, :updated_at)";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':codigo',$turma->getCodigo(),PDO::PARAM_STR);
				$stmt->bindValue(':disciplina',$turma->getDisciplina(),PDO::PARAM_STR);
				$stmt->bindValue(':user_id',$turma->getUser()->getId(),PDO::PARAM_INT);
				$stmt->bindValue(':created_at',$turma->getCreatedAt());
				$stmt->bindValue(':updated_at',$turma->getUpdatedAt());
				
				if($stmt->execute()){
					return true;
				}
				return false;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function update(Turma $turma){
			try{
				$sql = "UPDATE turmas SET codigo=:codigo, disciplina=:disciplina, updated_at=:updated_at WHERE id=:id";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':codigo',$turma->getCodigo(),PDO::PARAM_STR);
				$stmt->bindValue(':disciplina',$turma->getDisciplina(),PDO::PARAM_STR);
				$stmt->bindValue(':updated_at',$turma->getUpdatedAt());
				$stmt->bindValue(':id',$turma->getId(),PDO::PARAM_INT);

				if($stmt->execute()){
					return true;
				}

				return false;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id){
			try{
				$sql = "DELETE FROM turmas WHERE id = :id";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':id',$id,PDO::PARAM_INT);
				
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