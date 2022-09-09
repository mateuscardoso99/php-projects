<?php
include_once 'pessoa.php';
    class Funcionario extends Pessoa{
        private $codigo;
        
        function getCodigo() {
            return $this->codigo;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function __construct($nome, $email, $telefone, $codigo) {
            parent::__construct($nome, $email, $telefone);
            $this->codigo = $codigo;
        }

    }
?>

