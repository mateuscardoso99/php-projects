<?php
    abstract class Pessoa{
        private $nome;
        private $email;
        private $telefone;
        
        function __construct($nome, $email, $telefone) {
            $this->nome = $nome;
            $this->email = $email;
            $this->telefone = $telefone;
        }

        
        function getNome() {
            return $this->nome;
        }

        function getEmail() {
            return $this->email;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }


        
    }
?>

