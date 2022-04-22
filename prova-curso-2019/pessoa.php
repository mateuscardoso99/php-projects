<?php
    include_once 'IPessoa.php';

    abstract class Pessoa implements IPessoa{
        protected $nome;
        protected $cpf;
        
        function __construct($nome, $cpf) {
            $this->nome = $nome;
            $this->cpf = $cpf;
        }

        function getNome() {
            return $this->nome;
        }

        function getCpf() {
            return $this->cpf;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getDados() {
            echo "NOME: " .$this->nome .'<br>';
            echo "CPF DA PESSOA: " .$this->cpf .'<br>';
        }
    }
?>

