<?php
    include_once 'banco.class.php';
    class Telefone{
        public $id;
        public $numero;
        public $idPessoa;

        function __construct($id, $numero, $idPessoa){
            $this->id = $id;
            $this->numero = $numero;
            $this->idPessoa = $idPessoa;
        }
        function inserir(){
            $campos = $this->id . "," . $this->numero . "," . 
                      $this->idPessoa;
            $banco = new Database();
            $banco->inserir("telefone", "id, numero, idPessoa", $campos);
            $banco->__destruct();
        }
        
    }

?>