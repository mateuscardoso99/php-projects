<?php

    class Database{
        private $host = 'localhost';
        private $port = 3307;
        private $banco = '';
        private $usuario = '';
        private $senha = '';
        public $conn;

        function __construct(){
            try{
                $this->conn = new PDO("mysql:host=$this->host;
                                    port=$this->port;
                                    dbname=$this->banco",
                                    "$this->usuario",
                                    "$this->senha");
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        function inserir($tabela, $campos, $valores){
            $sql = "INSERT INTO $tabela ($campos) VALUES ($valores)";
            try{
                $this->conn->exec($sql);
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function seleciona($tabela){
            $sql = "SELECT * FROM $tabela";
            try{
                $resultado = $this->conn->query($sql);
                return $resultado;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function selecionaCampo($tabela, $campo, $valor){
            $sql = "SELECT * FROM $tabela WHERE $campo = $valor";
            try{
                $resultado = $this->conn->query($sql);
                return $resultado;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function __destruct(){
            $this->conn = null;
        }


    }

?>