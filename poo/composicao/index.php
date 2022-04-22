<?php

    include_once 'pessoa.class.php';

    $pessoa1 = new Pessoa(10, "Fernando", 10, 655654);
    $pessoa1->inserir();

    $pessoa1->listar();

?>