<?php
    include_once "./class.php";
    $d = new Teste('teste');

    $array = array(
        array(1,2,3,4,5),
        array(6,7,8,9,10)
    );

    foreach($array as $i=>$value){
        foreach($value as $j){
            echo $j;
        }
        print("<br>");
    }

    foreach($array as $key){
        foreach($key as $value){
            echo $value."<br>";
        }
        printf("<br>");
    }

    $array2 = array("palio","gol");
    for($i=0; $i < count($array2); $i++){
        echo $array2[$i],"<br>";
    }

    $array3 = array("carro1"=>"fusca","carro2"=>"chevete");
    echo $array3["carro1"].'<br><br>';//fusca

    $pessoa['nome']='joao';
    echo $pessoa['nome'].'<br>';//joao

    //objeto
    $objeto = new stdClass();
    $objeto->key = 'ola';
    echo $objeto->key,"<br>";//ola

    $objeto2 = (object) $pessoa;//passando array pra objeto
    print_r($objeto2);

    echo '<br><br>';

    foreach($array3 as $key=>$value){
        echo $array3[$key],"<br>";//fusca chevete
    }

    $nome = "joao";
    $sobrenome = "silva";
    echo '<p style=color:red;>',$sobrenome,' ',$nome,'</p>';//echo imprime string
    //print();//imprime string
    //print_r()//imprime arrays
    //printf()//semelhante ao printf do c

    $r = '4';
    $t = 4;
    //echo $r+$t;//8
    if($r === $t){
        echo 'igual';
    }

    echo "<br><br>";


    //Defina um array com os valores: Carlos, 9, 7, Bianca, 7, 10. Calcule a média aritmética de Carlos e Bianca, e exiba o resultado
    $array4 = array("carlos",9,7,"bianca",7,10);
    foreach($array4 as $key=>$value){
        if(gettype($value) === "string"){
            $media = ($array4[$key+1]+$array4[$key+2])/2;
            echo 'media de '.$value.' = '.$media.'<br>';
        }
    }
?>
