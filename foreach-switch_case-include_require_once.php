<?php
    $frutas = array('uva','laranja','banana','manga');
    $frutas2 = array('fruta1'=>'maca','fruta2'=>'morango','fruta3'=>'abacaxi','laranja');

    foreach($frutas as $valor){
        echo $valor.'<br>';
    }//uva laranja banana manga

    foreach($frutas2 as $valor){
        echo $valor.'<br>';
    }//maca morango abacaxi laranja

    foreach($frutas as $indice=>$valor){
        echo $frutas[$indice].'<br>';
    }//uva laranja banana manga

    foreach($frutas2 as $indice=>$valor){
        echo $indice.'<br>';
    }//fruta1 fruta2 fruta3 0

    $num = 36.9;
    switch($num){
        case 1:
            echo 1;
            break;
        case 2:
            echo 2;
            break;
        case 36.9:
            echo 36.9;
            break;
        default:
            echo 'default';
    }

    $texto = 'casa';
    switch($texto){
        case 'casa':
            echo $texto;
            break;
        case 'ola':
            echo $texto;
            break;
    }


    /**
     * diferença entre include e require é a forma como um erro é tratado
     * require é idêntico ao include, exceto em caso de falha que também produzirá um erro fatal de nível E_COMPILE_ERROR. 
     * Em outras palavras, ele irá parar o script enquanto que o include apenas emite um aviso (E_WARNING) que permite que o script continue.
     * O acréscimo de _once (para ambos os casos) diz ao PHP para verificar se o arquivo já foi incluído, caso ele tenha sido não será incluso novamente
     */
?>