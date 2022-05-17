<?php
	namespace App\Models;

	class Aluno{
		private $id;
		private $nome;
		private $matricula;
		private $turma;
		private $created_at;
		private $updated_at;

		public function getId(){
			return $this->id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getMatricula(){
			return $this->matricula;
		}

		public function getTurma(){
			return $this->turma;
		}

		public function getCreatedAt(){
			return $this->created_at;
		}

		public function getUpdatedAt(){
			return $this->updated_at;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function setMatricula($matricula){
			$this->matricula = $matricula;
		}

		public function setTurma($turma){
			$this->turma = $turma;
		}

		public function setCreatedAt($created_at){
			$this->created_at = $created_at;
		}

		public function setUpdatedAt($updated_at){
			$this->updated_at = $updated_at;
		}
	}
?>