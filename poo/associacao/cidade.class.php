<?php
    include_once 'banco.class.php';

    class Cidade{
        public $idCidade;
        public $nome;

        function __construct($idCidade, $nome){
            $this->idCidade = $idCidade;
            $this->nome = $nome;
        }

        function inserir(){
            $valores = $this->idCidade . ", '" . $this->nome . "'";
            $banco = new Database();
            $banco->inserir("cidade", "idCidade, nomeCidade", $valores);
            $banco->__destruct();
        }

    }


?>