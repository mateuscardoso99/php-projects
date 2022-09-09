<?php
include_once 'juridico.php';
include_once 'fisica.php';
include_once 'pessoa.php';
    
    if($_GET['tipo'] == "juridico"){
        $j = new Juridico($_GET['nome'], $_GET['idade'], "34279-9999");
        $j->getDados();
    }
    else if($_GET['tipo'] == 'fisica'){
        $f = new Fisica($_GET['nome'], $_GET['idade'], "345.667.120-00");
        $f->getDados();
    }
    else{
        echo "somente pessoas físicas ou jurídicas podem ser cadastradas";
    }

?>

