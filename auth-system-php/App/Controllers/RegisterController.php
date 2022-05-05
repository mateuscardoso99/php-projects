<?php
	
	namespace App\Controllers;

	use App\Dao\UsuarioDao;
	use App\Validation\Validation;
	use App\Models\User;

	class RegisterController{

		public function store($data){
			$validator = new Validation();

			$msg = $validator->check_empty($data,array('name','email','password'));
			$check_email = $validator->check_email($data['email']);

			if(!isset($_SESSION)){
				session_start();
			}
			
			if($msg != null){
				$_SESSION['error'] = $msg;
			}
			elseif(!$check_email){
				$_SESSION['error'] = 'email inválido';
			}
			else{
				$userDao = new UsuarioDao();
				$verify_email = $userDao->findByEmail($data['email']);

				if(isset($verify_email['email']) == $data['email']){
					$_SESSION['error'] = "email já cadastrado";
				}
				else{
					$user = new User();

					$token = bin2hex(random_bytes(30));

					$user->setName(htmlentities(trim($data['name'])));
					$user->setEmail(htmlentities(trim($data['email'])));
					$user->setPassword($data['password']);
					$user->setEmailVerifiedAt(null);
					$user->setEmailVerificationToken($token);
					$user->setRememberToken(null);
					$user->setCreatedAt(date('Y-m-d H:i:s'));

					if($userDao->insert($user)){
						//send link email
						//link verficar email: verify-email.php?token=
						
						$_SESSION['success'] = "Conta criada com sucesso";
					}
					else {
						$_SESSION['error'] = "Não foi possível criar a conta";
					}
				}
			}

			header("Location: signup.php");
		}


	}
?>