<?php
    include_once 'pessoa.php';
    include_once 'passageiro.php';
    include_once 'piloto.php';
    include_once 'endereco.php';
    include_once 'voo.php';
    include_once 'aviao.php';

//nome: mateus;

    $p1 = new Piloto("joao", "567.334.009-00", "2000 horas");
    $p2 = new Piloto("maria", "122.455.200.90", "7500 horas");
    
    $av1 = new Aviao("F16", 2, 2000);
    $av2 = new Aviao("a380", 400, 19);
    
    $passageiro111 = new Passageiro("carlos", "221.000.340-70", "belo horizonte", "Minas Gerais");
    $passageiro222 = new Passageiro("roberto", "290.223.654.00", "caxias", "RS");
    $passageiro333 = new Passageiro("clara", "045.223.568-89", "goiania", "Goiás");
    $passageiro444 = new Passageiro("neymar", "341.554.899-91", "juiz de fora", "Minas Gerais");
    
    $voo = new Voo(50);//INSTANCIANDO UM VOO
    
    $voo->inserirPassageiro($passageiro111);
    $voo->inserirPassageiro($passageiro222);
    $voo->inserirPassageiro($passageiro333);
    $voo->inserirPassageiro($passageiro444); 
    
    $voo->inserirPiloto($p2);    
        
    $voo->inserirAviao($av1);
    
    if($av1->getAutonomia() < $voo->getDistancia()){
        echo "ESSE AVIAÕ NÃO TEM AUTONOMIA PARA ESSA DISTÂNCIA." .'<br>' .'<br>';
    }
    else{
        echo "ESSE AVIÃO TEM AUTONOMIA PARA A VIAGEM." .'<br>' .'<br>';
    }
    //COMPARANDO DISTÂNCIA COM AUTONOMIA
    
    $voo->liberarVooParaDecolagem();
    $voo->listarPassageiros();
    
    Passageiro::total();//MOSTRANDO O TOTAL DE PASSAGEIROS CADASTRADOS.
?>
