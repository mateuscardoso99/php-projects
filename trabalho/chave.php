<?php
    include_once 'banco.php';
    
    class Chave{
        private $sala;
        private $situacao;
        private $porteiro;
        
        function __construct($sala,$porteiro) {
            $this->sala = $sala;
            $this->porteiro = $porteiro;
        }
        
        function getSala() {
            return $this->sala;
        }

        function getSituacao() {
            return $this->situacao;
        }

        function getPorteiro() {
            return $this->porteiro;
        }

        function setSala($sala) {
            $this->sala = $sala;
        }

        function setSituacao($situacao) {
            $this->situacao = $situacao;
        }

        function setPorteiro($porteiro) {
            $this->porteiro = $porteiro;
        }

                 
        function inserir(){
            $sala = $this->getSala();
            $p = $this->getPorteiro();
            $banco = new Database();
            $banco->inserir("chave", "sala,idporteiro", "'$sala', $p");
            $banco->__destruct();
        }
        
        static function atualizar($campo, $valor, $id){
            $banco = new Database();
            $banco->update("chave", $campo, $valor, $id);
            $banco->__destruct();
        }
        
        static function apagar($id){
            $banco = new Database();
            $banco->delete("chave", "id", $id);
            $banco->__destruct();
        }
        
        static function liberarChave($idchave, $idprofessor, $idaluno, $data, $idp){
            $banco = new Database();
            $banco->inserir("aula", "idchave, idprofessor, idaluno, datainicio, idporteiro", "$idchave, $idprofessor, $idaluno, '$data', $idp");
            $banco->__destruct();
            
        }
        
        static function devolverChave($data, $idchave){
            $banco = new Database();
            $banco->fecharAula("'$data'", $idchave);
            $banco->__destruct();
        }
    }

?>

