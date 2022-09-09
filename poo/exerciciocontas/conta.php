<?php
include_once 'interface.php';
    abstract class Conta implements intconta{
        public $saldo;
        public static $numeroConta = 0;
        public $agencia;
        
        function __construct($saldo, $agencia) {
            $this->saldo = $saldo;
            $this->agencia = $agencia;
         //   self::numeroConta += 1;
			//self::$contador;
      //      self::$contador = self::$contador + 1;
        }
        abstract function sacar($valor);
        abstract function depositar($valor);
        abstract function saldo();
    }
?>

