<?php
    class Produto{
        private $codigo;
        private $nome;
        private $quantidade;
        private $preco;
        
        function __construct($codigo, $nome, $quantidade, $preco) {
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->quantidade = $quantidade;
            $this->preco = $preco;
        }

        function getCodigo() {
            return $this->codigo;
        }

        function getNome() {
            return $this->nome;
        }

        function getQuantidade() {
            return $this->quantidade;
        }

        function getPreco() {
            return $this->preco;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        function setPreco($preco) {
            $this->preco = $preco;
        }


    }
?>

