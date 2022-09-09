<?php

    class Estacionamento{
        public $carros;
        public $limiteDeCarros;
        public $carrosAtualmente;

        function __construct($limiteDeCarros){
            $this->limiteDeCarros = $limiteDeCarros;
            $this->carrosAtualmente = 0;
        }

        function inserirCarro($carro){
            if($this->carrosAtualmente < $this->limiteDeCarros){
                $this->carros[] = $carro; 
                $this->carrosAtualmente++;
            }else{
                echo "ESTACIONAMENTO CHEIO PARA O CARRO COM PLACA: ". $carro->placa. " <br>";
            }
        }

        function listarCarros(){
            echo "<br> CARROS NO ESTACIONAMENTO <br>";
            foreach($this->carros as $c){
                $c->getDados();
            }
        }
    }

?>