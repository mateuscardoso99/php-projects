<?php
    abstract class Pessoa{
        private $nome;
        private $idade;
        
        function __construct($nome, $idade) {
            $this->nome = $nome;
            $this->idade = $idade;
        }
        
        function getNome() {
            return $this->nome;
        }

        function getIdade() {
            if($this->idade < 0){
                echo "idade inválida";
            }
            else
            return $this->idade;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setIdade($idade) {
            $this->idade = $idade;
        }

        abstract function getDados();


    }

?>

