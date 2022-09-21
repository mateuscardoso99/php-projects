<?php
	namespace App\Controllers;

	use App\Dao\UsuarioDao;
	use App\Validation\Validation;

	class ResetPasswordController {

		public function sendLink($data){
			$validator = new Validation();

			$msg = $validator->check_empty($data,array('email'));
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

				if (isset($verify_user['email'])) {
					$token = bin2hex(random_bytes(30));
					$expiration_date = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));

					$create_token = $userDao->tokenResetPassword($verify_user['email'],$token,$expiration_date);

					if($create_token === TRUE){
						//send email link
						//path: /reset-password.php?key='.$token.'&action=reset;

					}
					// else{
					// 	$_SESSION['error'] = "não foi possível enviar o link para redefinir a senha";
					// }
				}

				$_SESSION['success'] = "link enviado caso o email esteja cadastrado";
			}

			header("Location: forgot-password.php");
		}


		public function getTokenResetPasswordFromUser($token){
			$userDao = new UsuarioDao();
			$user_reset_password = $userDao->getTokenResetPasswordFromUser($token);
			return $user_reset_password;
		}

		public function updateUserPassword($email,$token,$password){
			$userDao = new UsuarioDao();
			$verify_user = $userDao->getTokenResetPasswordFromUser($token);

			if (!isset($verify_user['email']) || $verify_user['email'] != $email) {
				$msg = '<div class="error"><p>Invalid token</p></div>';
			}
			else{
				$user_update_password = $userDao->updateUserPassword($email,$password);

				$msg = '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
					<p><a href="./index.php">
					Click here</a> to Login.</p></div><br />';
			}
			return $msg;
		}
	}
?>