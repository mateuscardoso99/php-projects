<?php
    class ItemVenda{
        private $produto;
        private $valor;
        private $quantidade;
        
        function __construct($produto) {
            $this->produto = $produto;
        }

        function getProduto() {
            return $this->produto;
        }

        function getValor() {
            return $this->valor;
        }

        function getQuantidade() {
            return $this->quantidade;
        }

        function setProduto($produto) {
            $this->produto = $produto;
        }

        function setValor($valor) {
            $this->valor = $valor;
        }

        function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }


    }
?>

