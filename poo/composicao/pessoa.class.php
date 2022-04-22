<?php
    include_once 'banco.class.php';
    include_once 'telefone.class.php';

    class Pessoa{
        public $id;
        public $nome;
        public $telefone;

        function __construct($id, $nome, $idTelefone, $numero){
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = new Telefone($idTelefone, $numero, $id);
        }
        function inserir(){
            $valores = $this->id . ",'". $this->nome . "'";
            $banco = new Database();
            $banco->inserir("pessoacontato", "id, nome", $valores);
            $banco->__destruct();
            $this->telefone->inserir();
        }
        function listar(){
            $sql = "SELECT * FROM pessoacontato, telefone WHERE
                    pessoacontato.id = telefone.idPessoa AND 
                    pessoacontato.id = $this->id";
            $banco = new Database();
            $resultado = $banco->conn->query($sql);        
            $banco->__destruct();
            foreach($resultado as $r){
                echo "NOME: " . $r['nome'] . "<br>";
                echo "ID: " . $r['idPessoa'] . "<br>";
                echo "NUMERO: " . $r['numero'] . "<br>";
                echo "ID TELEFONE: " . $r['id'] . "<br><br>";
            }

        }
    }

?>