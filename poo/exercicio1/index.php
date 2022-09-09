<?php
include_once 'pessoa.php';
include_once 'cliente.php';
include_once 'funcionario.php';
include_once 'produto.php';
include_once 'itemVenda.php';
include_once 'venda.php';

    $c1 = new Cliente("joao", "zzzz@zzz.com", "4556889012", "19/04/2000");
    $func = new Funcionario("maria", "aaaassde@gmail.com", "8237089", "2331");
    
    $p1 = new Produto("3445", "arroz", 45, 290);
    $p2 = new Produto("55799", "batata", 12, 34);
    $p3 = new Produto("2299", "leite", 4, 5);
    
    $it1 = new ItemVenda($p1);
    $it2 = new ItemVenda($p2);
    
    $venda = new Venda("20/09", $c1, "vendido", $func);
    $venda->addItem($p1);
    $venda->addItem($p3);
    $venda->addItem($p2);
    
    $venda->finalizaVenda();
    
?>
