<?php
include_once 'endereco.php';
    class Pessoa{
        private $nome;
        private $cpf;
        private $codigo;
        private static $contador = 0;
        
        function getNome() {
            return $this->nome;
        }

        function getCpf() {
            return $this->cpf;
        }

        function getCodigo() {
            return $this->codigo;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function __construct($nome, $cpf, $estado, $cidade, $rua) {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->codigo = self::$contador;
            self::$contador = self::$contador + 1;
            $this->estado = new Endereco($estado, $cidade, $rua);
        }

    }
?>

