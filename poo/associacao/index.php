<?php
    include_once 'pessoa.class.php';
    include_once 'cidade.class.php';

    $cidade1 = new Cidade(1, "Santa Maria");
    $cidade1->inserir();

    $pessoa1 = new Pessoa(1, "Fernando", $cidade1);
    $pessoa1->inserir();

    $pessoa1->listar();

?>