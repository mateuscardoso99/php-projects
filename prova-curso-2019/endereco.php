<?php
    class Endereco{
        protected $cidade;
        protected $estado;
        
        function __construct($cidade, $estado) {
            $this->cidade = $cidade;
            $this->estado = $estado;
        }

        function getCidade() {
            return $this->cidade;
        }

        function getEstado() {
            return $this->estado;
        }

        function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }

    }
?>

