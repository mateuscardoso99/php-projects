<?php
    include_once 'banco.class.php';
    class Produto{
        public $id;
        public $nome;
        public $preco;

        function __construct($id, $nome, $preco){
            $this->id = $id;
            $this->nome = $nome;
            $this->preco = $preco;
        }

        function inserir(){
            $valores = $this->id . ", '" .$this->nome . "'," . $this->preco;
            $banco = new Database();
            $banco->inserir("produto", "id, nome, valor", $valores);
            $banco->__destruct();
        }
    }

?>