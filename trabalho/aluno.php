<?php
    class Aluno{
        private $nome;
        private $curso;
        private $professor;
        
        function __construct($nome, $curso, $professor) {
            $this->nome = $nome;
            $this->curso = $curso;
            $this->professor = $professor;
        }

        function getNome() {
            return $this->nome;
        }

        function getCurso() {
            return $this->curso;
        }

        function getProfessor() {
            return $this->professor;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setCurso($curso) {
            $this->curso = $curso;
        }

        function setProfessor($professor) {
            $this->professor = $professor;
        }


        function inserir(){
            $nome = $this->getNome();
            $curso = $this->getCurso();
            $id = $this->getProfessor();
            $banco = new Database();
            $banco->inserir("aluno", "nome, curso, idprofessor", "'$nome', '$curso', $id");
            $banco->__destruct();
        }
        
        static function atualizar($campo, $valor, $id){
            $banco = new Database();
            $banco->update("aluno", $campo, $valor, $id);
            $banco->__destruct();
        }
        
        static function desativar($id){
            $banco = new Database();
            $banco->desativarCadastros("aluno", $id);
            $banco->__destruct();
        }
        
        static function ativar($id){
            $banco = new Database();
            $banco->ativarCadastros("aluno", $id);
            $banco->__destruct();
        }
        
        static function apagar($id){
            $banco = new Database();
            $banco->delete("aluno", "id", $id);
            $banco->__destruct();        
        }
    }
?>

