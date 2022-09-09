<?php
    //matriz (array de arrays)
    $produtos = array(
                    "0" => array("codigo" => 101, "nome" => "arroz", "preco" => 490),
                    "1" => array("codigo" => 102, "nome" => "batata", "preco" => 230),
                    "2" => array("codigo" => 103, "nome" => "feijao", "preco" => 670),
                    "3" => array("codigo" => 104, "nome" => "cebola", "preco" => 130),
                    "4" => array("codigo" => 105, "nome" => "abacate", "preco" => 390)
                );

    print_r($produtos);

    for($i=0; $i<=4; $i++){
        switch($produtos[$i]["codigo"]){
            case 101:
                $produtos[$i]["preco"] = $produtos[$i]["preco"]*1.10;
            break;

            case 102:
                $produtos[$i]["preco"] = $produtos[$i]["preco"]*0.85;
            break;

            case 103:
                $produtos[$i]["preco"] = $produtos[$i]["preco"]*1.05;
            break;

            case 104:
                $produtos[$i]["preco"] = $produtos[$i]["preco"]*0.50;
            break;

            case 105:
                $produtos[$i]["preco"] = $produtos[$i]["preco"]*0.82;
            break;
        }

    }

    echo "<br>";
    echo "<br>";

    echo "produtos com preco atualizado: <br>";

    print_r($produtos);
    
    
    //vetor
    $vet  = array(1,2,3,4,5);
    $vet2 = array("1"=>1, "ola"=>"mundo");
    
    echo "foreach <br>";
    
    foreach ($vet as $value) {
        echo "$value <br>";
    } //12345
    
    foreach($vet as $key=>$value){
        echo "$key <br>";
    } //imprime os indices (0,1,2,3,4)
    
    foreach($vet as $key=>$value){
        echo "$value <br>";
    } //imprime os valores (1,2,3,4,5)
    
    foreach($vet2 as $key=>$value){
        echo "posicao: ".$key.", valor: ".$value."<br>";
    } //posicao: 1, valor: 1, posicao: ola, valor: mundo
    
    foreach($vet as $key=>$value){
        echo "vet[$key]=$value<br>";
    }//vet[0]=1, vet[1]=2, vet[2]=3... caso nao tenha as chaves definidas com no vetB usa-se como key a propria posicao do elemento
    
    $cores = array("chave01"=>"Azul","Amarelo","Vermelho");
    foreach ($cores as $key => $value) { 
        echo  $key." => ".$value."<br/>";
    }//chave01 => Azul, 0 => Amarelo, 1 => Vermelho
    
    
    //foreach com matriz
    foreach($produtos as $prod){
        echo $prod["codigo"].", ".$prod["nome"].", ".$prod["preco"]."<br>";
    }//101, arroz, 539 - 102, batata, 195.5 - 103, feijao, 703.5 - 104, cebola, 65 - 105, abacate, 319.8
    
    foreach($produtos as $prod){
        foreach($prod as $key=>$value){
            echo "$key: $value<br>";
        }
    }
    /*codigo: 101
    nome: arroz
    preco: 539
    codigo: 102
    nome: batata
    preco: 195.5
    codigo: 103
    nome: feijao
    preco: 703.5
    codigo: 104
    nome: cebola
    preco: 65
    codigo: 105
    nome: abacate
    preco: 319.8*/


    //matriz
    $alunos = array(
                "aluno1" => array("matricula" => 229294,"nome:" => "carlos"),
                "aluno2" => array("matricula" => 45453,"nome:" => "maria")
            );

    echo "<br>";


    print_r($alunos["aluno1"]);//array("matricula" => 229294,"nome:" => "carlos")
    echo "<br>" .$alunos["aluno1"]["matricula"];//229294


    $matricula = array(
                    "maria" => array("matricula: " => 2377423,"codigoDisciplina: " => 234),
                    "joao" => array("matricula: " => 065774,"codigoDisciplina: " => 255)
                );
    

    echo "<br>";
    print_r($matricula);

    //unset apaga o array
    //unset($matricula[]);

    //print_r($alunos["aluno1"]);
    echo "<br>" .$matricula["maria"]["codigoDisciplina: "];//234   


    $matriz = array(
                0 => array(9,8,7),
                1 => array(6,5,4),
                2 => array(3,2,1)
            );

    echo "diagonal principal <br>";

    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
           // echo $matriz[$i][$j];

            if($i == $j){
                echo $matriz[$i][$j];
            }

        }
        echo '<br>';
    }
?>
