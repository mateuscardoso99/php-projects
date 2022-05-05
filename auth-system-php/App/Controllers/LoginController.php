<?php
	
	namespace App\Controllers;

	use App\Dao\UsuarioDao;
	use App\Validation\Validation;

	class LoginController{

		public function login($data){
			$validator = new Validation();

			$msg = $validator->check_empty($data,array('email','password'));
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
				$verify_user = $userDao->findByEmail($data['email']);

				if(isset($verify_user['email']) && password_verify($data['password'], $verify_user['password'])){
					$_SESSION['user_id'] = $verify_user['id'];
					$_SESSION['name'] = $verify_user['name'];
					$_SESSION['email'] = $verify_user['email'];
					$_SESSION['password'] = $verify_user['password'];
					$_SESSION['email_verified_at'] = $verify_user['email_verified_at'];
					$_SESSION['created_at'] = $verify_user['created_at'];
					$_SESSION['loggedin'] = true;

					if (is_null($verify_user['email_verified_at'])) {
						header("Location: redirect-email-verification.php");
					}
					else{
						header("Location: dashboard.php");
					}
				}
				else{
					$_SESSION['error'] = "email ou senha incorretos";
				}
			}

			header("Location: index.php");

		}
	}

?>