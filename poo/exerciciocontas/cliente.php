<?php
    class Cliente{
    public $nome;
    private $cpf;
    public $contaCorrente;
    public $contaPoupanca;
    
    function __construct($nome, $cpf, $saldocorrente, $agenciaC, $limite, $saldopoupanca, $agenciaP, $aniversario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->contaCorrente = new ContaCorrente($saldocorrente, $agenciaC, $limite);
        $this->contaPoupanca = new ContaPoupanca($saldopoupanca, $agenciaP, $aniversario);
    }

    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }


    
    
    
    }
?>

