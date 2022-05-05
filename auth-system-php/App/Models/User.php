<?php
	namespace App\Models;
	
	class User{
		private $id;
		private $name;
		private $email;
		private $password;
		private $email_verified_at;
		private $email_verification_token;
		private $remember_token;
		private $created_at;

		public function getId(){
			return $this->id;
		}

		public function getName(){
			return $this->name;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getEmailVerifiedAt(){
			return $this->email_verified_at;
		}

		public function getEmailVerificationToken(){
			return $this->email_verification_token;
		}

		public function getRememberToken(){
			return $this->remember_token;
		}

		public function getCreatedAt(){
			return $this->created_at;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function setPassword($password){
			$this->password = password_hash($password, PASSWORD_BCRYPT);
		}

		public function setEmailVerifiedAt($email_verified_at){
			$this->email_verified_at = $email_verified_at;
		}

		public function setEmailVerificationToken($email_verification_token){
			$this->email_verification_token = $email_verification_token;
		}

		public function setRememberToken($remember_token){
			$this->remember_token = $remember_token;
		}

		public function setCreatedAt($created_at){
			$this->created_at = $created_at;
		}
	}

?>