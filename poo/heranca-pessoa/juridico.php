<?php
include_once 'pessoa.php';
    class Juridico extends Pessoa{
        private $cnpj;
        
        function __construct($nome, $idade, $cnpj) {
            parent::__construct($nome, $idade);
            $this->cnpj = $cnpj;
        }

        function getCnpj() {
            return $this->cnpj;
        }

        function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }

        function getDados(){
            echo "PESSOA JURÍDICA com o nome ";
            echo $this->getNome();
            echo " idade ";
            echo $this->getIdade();
            echo " anos.";
        }
    }
?>

