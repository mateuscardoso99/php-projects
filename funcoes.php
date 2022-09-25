<?php
    $r;
    function func($var = null){
        global $r; //acessar variavel de fora dentro da funcao
        $r = 6;
        return array($var,$var*2);//return multiple values
    }

    echo func(5)[1];
    echo '<br>',$r;
?>