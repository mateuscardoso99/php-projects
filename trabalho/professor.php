<?php
    class Professor{
        private $nome;
        private $graduacao;
        
        function __construct($nome, $graduacao) {
            $this->nome = $nome;
            $this->graduacao = $graduacao;
        }
        
        function getNome() {
            return $this->nome;
        }

        function getGraduacao() {
            return $this->graduacao;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setGraduacao($graduacao) {
            $this->graduacao = $graduacao;
        }

        function inserir(){
            $nome = $this->getNome();
            $graduacao = $this->getGraduacao();
            $banco = new Database();
            $banco->inserir("professor", "nome, graduacao", "'$nome', '$graduacao'");
            $banco->__destruct();
        }
        
        static function atualizar($campo,$valor, $id){
            $banco = new Database();
            $banco->update("professor", $campo, $valor, $id);
            $banco->__destruct();
        }
        
        static function desativar($id){
            $banco = new Database();
            $banco->desativarCadastros("professor", $id);
            $banco->__destruct();
        }
        
        static function ativar($id){
            $banco = new Database();
            $banco->ativarCadastros("professor", $id);
            $banco->__destruct();
        }
        
        static function apagar($id){
            $banco = new Database();
            $banco->delete("professor", "id", $id);
            $banco->__destruct();
        }
    }
?>

