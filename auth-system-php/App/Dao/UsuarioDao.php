<?php
	namespace App\Dao;

	use App\Database\DB;
	use App\Models\User;
	use PDO;

	class UsuarioDao{

		public function findByEmail($email){
			$sql = "SELECT * FROM users WHERE email = ?";
			$stmt = DB::connection()->prepare($sql);
			$stmt->bindValue(1,$email,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function tokenResetPassword($email,$token,$expiration_date){
			try{
				$sql = "INSERT INTO password_resets (email,token,expiration_date) VALUES (?,?,?);";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(1,$email,PDO::PARAM_STR);
				$stmt->bindValue(2,$token,PDO::PARAM_STR);
				$stmt->bindValue(3,date('Y-m-d H:i:s',$expiration_date));
				
				if($stmt->execute()){
					return true;
				}
				
				return false;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function getTokenResetPasswordFromUser($token){
			try{
				$sql = "SELECT * FROM password_resets WHERE token = :token";
				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':token',$token,PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function updateUserPassword($email,$password){
			try{
				$sql = "UPDATE users SET password = ? WHERE email = ?";
				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(1,password_hash($password, PASSWORD_BCRYPT));
				$stmt->bindValue(2,$email);
				$stmt->execute();

				$sql = "DELETE FROM password_resets WHERE email = ?";
				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(1,$email);
				$stmt->execute();

				return true;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function insert(User $user){
			try {
				$sql = "INSERT INTO users (name, email, password, email_verified_at, email_verification_token, remember_token, created_at) VALUES (:name, :email, :password, :email_verified_at, :email_verification_token, :remember_token, :created_at)";

				$stmt = DB::connection()->prepare($sql);
				$stmt->bindValue(':name',$user->getName(),PDO::PARAM_STR);
				$stmt->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
				$stmt->bindValue(':password',$user->getPassword());
				$stmt->bindValue(':email_verified_at',$user->getEmailVerifiedAt());
				$stmt->bindValue(':email_verification_token',$user->getEmailVerificationToken(),PDO::PARAM_STR);
				$stmt->bindValue(':remember_token',$user->getRememberToken());
				$stmt->bindValue(':created_at',$user->getCreatedAt());
				
				if($stmt->execute()){
					return true;
				}
				return false;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

	}
?>