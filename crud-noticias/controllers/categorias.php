<?php

	include_once '../database/connection.php';

	class Categorias{
		private $db;
		private $connection;

		function __construct(){
			$this->db = new Database();
			$this->connection = $this->db->getConnection();
		}

		function show(){
			$sql = "select * from categorias";
			$result = $this->connection->query($sql);
			$categorias = $result->fetchAll(PDO::FETCH_ASSOC);
			$this->db->closeConnection();
			return $categorias;
		}

	}

?>