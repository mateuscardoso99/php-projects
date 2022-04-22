<?php
    include_once 'pessoa.php';
    
    class Piloto extends Pessoa{
        private $horasDeVoo;
        
        function __construct($nome, $cpf, $horasDeVoo) {
            parent::__construct($nome, $cpf);
            $this->horasDeVoo = $horasDeVoo;
        }

        function getHorasDeVoo() {
            return $this->horasDeVoo;
        }

        function setHorasDeVoo($horasDeVoo) {
            $this->horasDeVoo = $horasDeVoo;
        }

        function getDados(){
            echo "NOME DO PILOTO: " .$this->getNome();
            echo "HORAS DE VOO: " .$this->horasDeVoo;
        }
    
    }
?>

