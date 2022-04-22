<?php
    include_once 'banco.php';
    
    class Porteiro{
        private $nome;
        
        function __construct($nome) {
            $this->nome = $nome;
        }
        
        function getNome() {
            return $this->nome;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

                
        function inserir(){
            $nome = $this->getNome();
            $banco = new Database();
            $banco->inserir("porteiro", "nome", "'$nome'");
            $banco->__destruct();
        }
        
        function atualizar($campo, $valor, $id){
            $nome = $this->getNome();
            $banco = new Database();
            $banco->update("porteiro", $campo, $valor, $id);
            $banco->__destruct();
        }
        
        static function apagar($id){
            $banco = new Database();
            $banco->delete("porteiro", "id", $id);
            $banco->__destruct();
        }

        static function desativar($id){
            $banco = new Database();
            $banco->desativarCadastros("porteiro", $id);
            $banco->__destruct();
        }
        
        static function ativar($id){
            $banco = new Database();
            $banco->ativarCadastros("porteiro", $id);
            $banco->__destruct();
        }
    }
?>

