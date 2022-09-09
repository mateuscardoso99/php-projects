<?php
    include_once 'carro.class.php';
    include_once 'estacionamento.class.php';

    $estacionamento = new Estacionamento(2);

    $carro1 = new Carro("FUH-5841", "GOL");
    $carro2 = new Carro("MHA-5981", "ONIX");
    $carro3 = new Carro("PLO-9844", "PALIO");

    $estacionamento->inserirCarro($carro1);
    $estacionamento->inserirCarro($carro2);
    $estacionamento->inserirCarro($carro3);

    $estacionamento->listarCarros();

?>