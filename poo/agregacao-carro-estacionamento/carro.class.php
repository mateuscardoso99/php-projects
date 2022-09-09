<?php
    class Carro{
        public $placa;
        public $nome;

        function __construct($placa, $nome){
            $this->placa = $placa;
            $this->nome = $nome;
        }

        function getDados(){
            echo "<br> PLACA: ". $this->placa;
            echo "<br> NOME: " . $this->nome;
        }

    }

?>