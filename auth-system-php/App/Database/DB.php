<?php
	namespace App\Database;
	use PDO;
	
	class DB{
		private static $instance;

		public static function connection(){
			try {
				if(!isset(self::$instance)):
					self::$instance = new PDO("mysql:host=localhost;port=3306;dbname=","","");
				endif;

				return self::$instance;
			} catch (PDOException $e) {
				echo "Database connection error ".$e->getMessage();
			}
		}
	}
?>