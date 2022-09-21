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

		/*
		PHP não tem suporte para declarar vários construtores de diferentes números de parâmetros para uma classe, ao contrário de linguagens como Java.

		primeiro precisamos contar o número de argumentos passados ao construtor usando func_num_args() e obter todos os argumentos atribuídos por func_get_args(). Então tudo o que nos resta fazer é chamar a função adequada usando call_user_func_array() passando os argumentos originais como segundo argumento de call_user_func_array()
		*/

		public function __construct(){
			$arguments = func_get_args();
	        $numberOfArguments = func_num_args();

	        if (method_exists($this, $function = '__construct'.$numberOfArguments)){
	            call_user_func_array(array($this, $function), $arguments);
        	}
		}

		public function __construct8($id,$name,$email,$password,$email_verified_at,$email_verification_token,$remember_token,$created_at){
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->password = $password;
			$this->email_verified_at = $email_verified_at;
			$this->email_verification_token = $email_verification_token;
			$this->remember_token = $remember_token;
			$this->created_at = $created_at;
		}

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