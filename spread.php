<?php
    function a(...$numeros){
        foreach($numeros as $n){
            echo $n;
        }
    }
    a(1,2,3,4,6);

    function imc(...$params){
        return $params[0] / ($params[1] * $params[1]);
    }

    echo '<br>'.imc(62,1.68);

    $array = array(1,2,3,4);
    $array2 = array(...$array, 5,6,7);
    $array3 = [...$array, ...$array2, 8,9,10];
    print_r($array2);
    print_r($array3);    
?>