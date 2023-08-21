<?php
$nome = null;
$qtd = null;

if(isset($_GET['nome']))
    $nome = $_GET['nome'];

if(isset($_GET['qtd']))
    $qtd = $_GET['qtd'];

if(!empty($qtd) && !empty($nome)){
    if($qtd>10){
        echo "limite qtd";
    }
    else{
        echo "compra feita";
    }
}

$r=array(
    array(1,2,3,4),
    array(5,6,7,8)
);
echo print_r($r[0]).'<br>';

            //chave=>valor
foreach($r as $key=>$v){
    foreach($v as $value){ //$v = array(1,2,3,4), $v = array(5,6,7,8)
        echo $value;//1,2,3,4,5,6,7,8
    }
    echo '<br>';
    //echo print_r($v).'<br>';
}

foreach($r as $key){
    foreach($key as $value){ //$key = array(1,2,3,4), $key = array(5,6,7,8)
        echo $value;//1,2,3,4,5,6,7,8
    }
    echo '<br>';
    //echo print_r($v).'<br>';
}

$a3 = array(
    1 => array(
        2 => array(
            3, 4
        )
    )
);

echo '<br><br>';
foreach($a3 as $k1){
    foreach($k1 as $k2){
        foreach($k2 as $k3){
            echo $k3;//3, 4
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="nome" id="">
        <input type="number" name="qtd" id="">
        <button type="submit" name="enviar" id="">dgdrt</button>
    </form>
</body>
</html>