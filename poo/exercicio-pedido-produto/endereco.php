<?php
    class Endereco{
        private $estado;
        private $cidade;
        private $rua;
        
        function getEstado() {
            return $this->estado;
        }

        function getCidade() {
            return $this->cidade;
        }

        function getRua() {
            return $this->rua;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }

        function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        function setRua($rua) {
            $this->rua = $rua;
        }

        function __construct($estado, $cidade, $rua) {
            $this->estado = $estado;
            $this->cidade = $cidade;
            $this->rua = $rua;
            
        }


    }
?>
