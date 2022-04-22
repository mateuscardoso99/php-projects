<?php
    class Aviao{
        private $modelo;
        private $capacidade;
        private $autonomia;
        
        function __construct($modelo, $capacidade, $autonomia) {
            $this->modelo = $modelo;
            $this->capacidade = $capacidade;
            $this->autonomia = $autonomia;
        }
        
        function getModelo() {
            return $this->modelo;
        }

        function getCapacidade() {
            return $this->capacidade;
        }

        function getAutonomia() {
            return $this->autonomia;
        }

        function setModelo($modelo) {
            $this->modelo = $modelo;
        }

        function setCapacidade($capacidade) {
            $this->capacidade = $capacidade;
        }

        function setAutonomia($autonomia) {
            $this->autonomia = $autonomia;
        }


    }
?>

