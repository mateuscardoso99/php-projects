<?php
	namespace App\Models;

	class Turma{
		private $id;
		private $codigo;
		private $disciplina;
		private $user;
		private $created_at;
		private $updated_at;

		public function getId(){
			return $this->id;
		}

		public function getCodigo(){
			return $this->codigo;
		}

		public function getDisciplina(){
			return $this->disciplina;
		}

		public function getUser(){
			return $this->user;
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

		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		public function setDisciplina($disciplina){
			$this->disciplina = $disciplina;
		}

		public function setUser($user){
			$this->user = $user;
		}

		public function setCreatedAt($created_at){
			$this->created_at = $created_at;
		}

		public function setUpdatedAt($updated_at){
			$this->updated_at = $updated_at;
		}
	}
?>