<?php
    include_once 'banco.class.php';

    class Pessoa{
        public $id;
        public $nome;
        public $cidade;

        function __construct($id, $nome, $cidade){
            $this->id = $id;
            $this->nome = $nome;
            $this->cidade = $cidade;
        }

        function inserir(){
            $valores = $this->id . ", '" . $this->nome . "' , " . 
                        $this->cidade->idCidade;
            $banco = new Database();
            $banco->inserir("pessoa", "id, nome, idCidade", $valores);
            $banco->__destruct();
        }

        function listar(){
            $sql = "SELECT * FROM pessoa, cidade WHERE
                    pessoa.id = $this->id and 
                    pessoa.idCidade = cidade.idCidade";
            $banco = new Database();
            $resultado = $banco->conn->query($sql);
            $banco->__destruct();
            foreach ($resultado as $r){
                echo "NOME = " . $r['nome'] . "<br>";
                echo "CIDADE = ". $r['nomeCidade'] . "<br>";
                echo "ID CIDADE = " . $r['idCidade'] . "<br><br>";
            }
            
        }

    }

?>