<?php
include_once 'pessoa.php';
    class Cliente extends Pessoa{
        private $dataCadastro;
        
        function __construct($nome, $email, $telefone, $dataCadastro) {
            parent::__construct($nome, $email, $telefone);
            $this->dataCadastro = $dataCadastro;
        }

        function getDataCadastro() {
            return $this->dataCadastro;
        }

        function setDataCadastro($dataCadastro) {
            $this->dataCadastro = $dataCadastro;
        }


}
?>

