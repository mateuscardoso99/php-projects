<?php
    include_once 'pessoa.php';
    include_once 'endereco.php';

    class Passageiro extends Pessoa{
        private $codigo;
        private $endereco;
        private static $contador = 0;
        
        function __construct($nome, $cpf, $cidade, $estado) {
            parent::__construct($nome, $cpf);
            $this->codigo = self::$contador;
            $this->endereco = new Endereco($cidade, $estado);
            self::$contador = self::$contador + 1;
        }
        
        function getCodigo() {
            return $this->codigo;
        }

        function getEndereco() {
            return $this->endereco;
        }

       /* static function getContador() {
            return self::$contador;
        }*/

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

       /* static function setContador($contador) {
            self::$contador = $contador;
        }*/
        
        static function total(){
            echo "TOTAL DE PASSAGEIROS CADASTRADOS: " .self::$contador .'<br>';
        }

    }
?>

