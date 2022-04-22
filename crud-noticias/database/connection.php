<?php

	class Database{
		private $host = 'localhost';
		private $db_name = '';
		private $encode = 'utf-8';
		private $port = 3306;
		private $user = '';
		private $password = ''; 
		public $db;

	function getConnection(){
		try {
			
			$this->db = new PDO("mysql:host=$this->host;
				port=$this->port;
				dbname=$this->db_name",
				"$this->user",
				"$this->password"
			);
			return $this->db;

		} catch (PDOExcepetion $e) {
			echo $e->getMessage();
			return false;
		}
	}

	function closeConnection(){
		$this->conn = null;
	}

}

?>