<?php
    class Database {
        private $host = 'localhost';
        private $port = 3307;
        private $usuario = 'root';
        private $senha = '';
        private $banco = 'aula';
        public $conn;

        function __construct(){
            try{
                $this->conn = new PDO("mysql:host=$this->host;
                                     port=$this->port;
                                     dbname=$this->banco",
                                     "$this->usuario",
                                     "$this->senha");
                return true;

            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }    
        }

        function __destruct(){
            $this->conn = null;
        }

        function inserir($tabela, $campos, $valores){
            $sql = "INSERT INTO $tabela($campos) VALUES ($valores)";
            try{
                $this->conn->exec($sql);
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        function update($tabela, $nome, $matricula, $nota, $where){
            $sql = "UPDATE $tabela SET nome=$nome, matricula=$matricula, notafinal=$nota WHERE nome=$where";
            try{
                $this->conn->exec($sql);
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        function delete($campo, $where){
            $sql = "DELETE FROM aluno WHERE $campo=$where";
            try{
                $this->conn->exec($sql);
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        function read($tabela, $where){
            if($where == null){
                $sql = "SELECT * FROM $tabela WHERE nome=$where";
            } else {
                $sql = "SELECT * FROM $tabela";
            }
            $result = $this->conn->query($sql);
            if($result){
                return $result;
            } else {
                return false;
            }
        }
    }
?>
