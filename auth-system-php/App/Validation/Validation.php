<?php
	namespace App\Validation;
	
	class Validation{
		public function check_empty($data, $fields){
			$message = null;
			foreach($fields as $value){
				if(empty($data[$value])){
					$message .= "campo $value está vazio <br>";
				}
			}
			return $message;
		}

		public function check_email($email){
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				return true;
			}
			return false;
		}
	}

?>