<?php
include_once 'pessoa.php';
    class Fisica extends Pessoa{
        private $cpf;
        
        function __construct($nome, $idade, $cpf) {
            parent::__construct($nome, $idade);
            $this->cpf = $cpf;
        }

        function getCpf() {
            return $this->cpf;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }
        
        function getDados(){
            echo "PESSOA FÍSICA com o nome ";
            echo $this->getNome();
            echo " idade ";
            echo $this->getIdade();
            echo " anos.";
        }

    }
?>

