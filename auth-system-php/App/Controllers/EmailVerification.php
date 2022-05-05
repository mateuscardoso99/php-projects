<?php 
	namespace App\Controllers;

	use App\Database\DB;
	use PDO;
	
	if(!empty($_GET['token'])){
		$sql = "SELECT * FROM users WHERE email_verification_token = ?";
		$stmt = DB::connection()->prepare($sql);
		$stmt->bindValue(1,$_GET['token'],PDO::PARAM_STR);
		$stmt->execute();

		$user = $stmt->fetch();

		if(isset($user['email'])){
			if(is_null($user['email_verified_at'])){
				$sql = "UPDATE users set email_verified_at = ? ,email_verification_token = ? WHERE email = ?";
				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(1,date('Y-m-d'));
				$stmt->bindValue(2,null);
				$stmt->bindValue(3,$user['email']);	

				if($stmt->execute()){
					if(!isset($_SESSION)){
						session_start();
					}
					session_destroy();
					
					$email_verified = '<div class="alert alert-success">User email successfully verified!</div>';
				} 
			}	
			else {
                $email_already_verified = '<div class="alert alert-danger">User email already verified!</div>';
            }

		}
		else {
            $activation_error = '<div class="alert alert-danger">Activation error!</div>';
        }
	}
?>