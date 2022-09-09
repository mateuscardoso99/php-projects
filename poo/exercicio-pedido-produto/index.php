<?php
include_once 'pedido.php';
include_once 'produto.php';
include_once 'pessoa.php';
include_once 'endereco.php';

    $prod11 = new Produto(200,506694);
    $prod22 = new Produto(500,69777);
    $prod33 = new Produto(6778,112694);
    
  //  $end1 = new Endereco("RS","caxias","rua s");
    
    $pessoa1 = new Pessoa("joao", "1235467898", "RS","caxias","rua s");
    $pessoa2 = new Pessoa("maria", "54654631120", "SP","canoas","rua r");
    $pessoa3 = new Pessoa("claudio", "5464564568", "MG","poa","rua p");
    
    $pedido1 = new Pedido("20/09", 0, $pessoa1);
    
    $pedido1->inserirProduto($prod33);
   // $pedido1->listarProdutos();
        $pedido1->inserirProduto($prod22);
		$pedido1->inserirProduto($prod11);
    $pedido1->listarProdutos();
	$pedido1->fecharCompra();
  // $pedido1->retirarProdutos($prod33);
    $pedido1->totalVendasEfetuadas();

?>
