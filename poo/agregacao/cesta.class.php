<?php
    include_once 'banco.class.php';
    include_once 'produto.class.php';

    class Cesta{
        public $id;
        public $nomeCliente;

        function __construct($id, $nomeCliente){
            $this->id = $id;
            $this->nomeCliente = $nomeCliente;
        }
        function inserir(){
            $valores = $this->id . ",'" . $this->nomeCliente . "'";
            $banco = new Database();
            $banco->inserir("cestacompras", "id, nomeCliente", $valores);
            $banco->__destruct();
        }
        function inserirProduto($produto){
            $valores = $this->id . "," . $produto->id;
            $banco = new Database();
            $banco->inserir("itenscesta", "idCesta, idProduto", $valores);
            $banco->__destruct();
        }
        function listarProdutos(){
            $sql = "SELECT * FROM produto JOIN itenscesta ON
                    (itenscesta.idProduto = produto.id) WHERE
                    itenscesta.idCesta = $this->id";
            $banco = new Database();
            $resultado = $banco->conn->query($sql);
            foreach ($resultado as $r){
                echo "IDCESTA: " . $r['idCesta'] . "<br>";
                echo "PRODUTO: " . $r['nome'] . "<br>";
                echo "VALOR: " . $r['valor'] . "<br><br>";
            }
        }
    }


?>