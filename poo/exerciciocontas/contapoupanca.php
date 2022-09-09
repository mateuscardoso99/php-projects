<?php
include_once 'conta.php';
    class ContaPoupanca extends Conta{
        public $aniversario;
		public $numi;
        
        function __construct($saldo, $agencia, $aniversario) {
            parent::__construct($saldo, $agencia);
            $this->aniversario = $aniversario;
			$this->numi = parent::$numeroConta ++;
        }

        
    public function depositar($valor) {
        $this->saldo += $valor;
    }

    public function sacar($valor) {
        $this->saldo -= $valor;
    }

    public function saldo() {
        echo "saldo conta poupanca: " .$this->saldo .'<br>' ;
		echo "numero da conta: " .$this->numi .'<br>';
    }

}
?>

