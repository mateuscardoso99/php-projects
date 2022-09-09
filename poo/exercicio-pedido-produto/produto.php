<?php
    class Produto{
        private $id;
        private static $contador = 1; 
        private $preco;
        private $codigo;
        
        function __construct($preco, $codigo) {
            $this->preco = $preco;
            $this->codigo = $codigo;
            $this->id = self::$contador;
            self::$contador = self::$contador + 1;
        }

        function getId() {
            return $this->id;
        }

        function getPreco() {
            return $this->preco;
        }

        function getCodigo() {
            return $this->codigo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setPreco($preco) {
            $this->preco = $preco;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
        
        

    }
?>