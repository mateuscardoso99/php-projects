<?php
    include_once 'cesta.class.php';
    include_once 'produto.class.php';

    $cesta = new Cesta(1, "ANTONIO");
    $cesta->inserir();

    $prod1 = new Produto(1, 'MOUSE', 15.5);
    $prod1->inserir();

    $prod2 = new Produto(2, 'TECLADO', 20);
    $prod2->inserir();

    $cesta->listarProdutos();

    echo date ("Ymd");

    //$cesta->inserirProduto($prod1);
   // $cesta->inserirProduto($prod2);

?>