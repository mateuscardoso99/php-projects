<?php
	namespace App\Dao;

	use App\Models\Turma;
	use App\Database\DB;
	use PDO;

	class TurmaDao{

		public function read(){
			$sql = "SELECT * FROM turmas";
			$rows = DB::connection()->query($sql);
			return $rows;
		}

		public function checkExits($id){
			$sql = "SELECT * FROM turmas WHERE id=?";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function insert(Turma $turma){
			try {
				$sql = "INSERT INTO turmas (codigo, disciplina, created_at, updated_at) VALUES (:codigo, :disciplina, :created_at, :updated_at)";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':codigo',$turma->getCodigo(),PDO::PARAM_STR);
				$stmt->bindValue(':disciplina',$turma->getDisciplina(),PDO::PARAM_STR);
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