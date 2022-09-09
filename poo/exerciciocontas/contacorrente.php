<?php
include_once 'conta.php';
    class ContaCorrente extends Conta{
        public $limite;
		public $num;
        
        function __construct($saldo,$agencia, $limite) {
            parent::__construct($saldo, $agencia);
            $this->limite = $limite;
			$this->num = parent::$numeroConta ++;
	//		parent::numeroConta++;
        }

        
    public function depositar($valor) {
        $this->saldo += $valor;
    }

    public function sacar($valor) {
        $this->saldo -= $valor;
    }

    public function saldo() {
        echo "saldo conta corrente: " .$this->saldo .'<br>';
		echo "numero da conta: " .$this->num .'<br>';
    }

}
?>

