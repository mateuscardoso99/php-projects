<?php
    include_once 'pessoa.php';
    include_once 'aviao.php';
    include_once 'passageiro.php';
    include_once 'piloto.php';

    class Voo{
        private $distancia;
        private $aviao;
        private $passageiros;
        private $piloto;
        
        function __construct($distancia) {
            $this->distancia = $distancia;
        }

         
        function getDistancia() {
            return $this->distancia;
        }

        function setDistancia($distancia) {
            $this->distancia = $distancia;
        }
           
        function getAviao() {
            return $this->aviao;
        }

        function getPassageiros() {
            return $this->passageiros;
        }

        function getPiloto() {
            return $this->piloto;
        }

        function setAviao($aviao) {
            $this->aviao = $aviao;
        }

        function setPassageiros($passageiros) {
            $this->passageiros = $passageiros;
        }

        function setPiloto($piloto) {
            $this->piloto = $piloto;
        }

            
        function inserirPassageiro(Passageiro $pass){
            $this->passageiros[] = $pass;
        }
            
        function inserirAviao(Aviao $av){
            $this->aviao = $av;
        }
            
        function inserirPiloto(Piloto $piloto){
            $this->piloto = $piloto;
        }
            
        function listarPassageiros(){
            echo "PASSAGEIROS:" .'<br>';
            foreach($this->passageiros as $c){
                $c->getDados() .'<br>';
                echo "CÓDIGO: " .$c->getCodigo() .'<br>';
                echo "CIDADE: " .$c->getEndereco()->getCidade().'<br>';
                echo "ESTADO: " .$c->getEndereco()->getEstado().'<br>'.'<br>';
            }
        }
            
        function liberarVooParaDecolagem(){
            if($this->aviao == null || $this->piloto == null){
                echo "OUTRO AVIÃO DEVE REALIZAR O PERCURSO, FALTA UM PILOTO OU UM AVIÃO." .'<BR>'.'<BR>';
            }
            else{
                echo "AVIÃO E PILOTO PRONTOS PARA DECOLAR." .'<BR>'.'<BR>';
            }
        }
    }

?>

