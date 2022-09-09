<?php
include_once 'pessoa.php';
include_once 'cliente.php';
include_once 'funcionario.php';
include_once 'produto.php';
include_once 'itemVenda.php';

    class Venda{
        private $dataVenda;
        private $valorTotal = 0;
        private $itens;
        private $cliente;
        private $status;
        private $funcionario;
        
        function __construct($dataVenda, $cliente, $status, $funcionario) {
            $this->dataVenda = $dataVenda;
            $this->cliente = $cliente;
            $this->status = $status;
            $this->funcionario = $funcionario;
        }

        
        function addItem(Produto $prod){
            $this->itens[] = $prod;
        }
        
        function finalizaVenda(){
            echo "DADOS DA VENDA:" .'<br>';
            echo "DATA: " .$this->dataVenda .'<br>';
            echo "CLIENTE: " .$this->cliente->getNome() .'<br>';
            echo "FUNCIONÁRIO: " .$this->funcionario->getNome() .'<br>';
            echo "PRODUTOS: " .'<br>';
            foreach($this->itens as $produtos){
                echo $produtos->getNome() .'<br>';
                $this->valorTotal += $produtos->getPreco();
            }
            echo "TOTAL A PAGAR: " .$this->valorTotal; 
            
        }
    }
?>

