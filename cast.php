<?php
    // $mysqli = new mysqli("localhost", "root", "", "phpmyadmin");
    // $resultado = $mysqli->query("select * from pma__userconfig");
    // print_r(mysqli_fetch_all($resultado));//Array ( [0] => Array ( [0] => root [1] => 2022-09-22 14:45:17 [2] => {"Console\/Mode":"collapse","lang":"pt"} ) ) string
    // print_r(mysqli_fetch_assoc($resultado));//Array ( [username] => root [timevalue] => 2022-09-22 14:45:17 [config_data] => {"Console\/Mode":"collapse","lang":"pt"} ) string

    $a = '1';
    echo gettype($a);//string

    $b = (int) $a;
    echo '<br>'.gettype($b);//int

    $c = (string) $b;
    echo '<br>'.gettype($c);//string

    $d = (float) $c;
    echo '<br>'.gettype($d);//double

    if(isset($_GET['qtd'])){
        if((int) $_GET['qtd'] <= 20){
            $resultado = (int)$_GET['qtd'] * 3;
        }
        else{
            $resultado = (int)$_GET['qtd'] * 5;
        }
        echo '<br>resultado '.$resultado;
    }

    $numero = 5;
    for($i=0;$i<=1;$i++){
        $numero *= 5;
        echo "<br>".$numero;
    }
?>

<form action="" method="get">
    <input type="number" name="qtd">
    <button type="submit">enviar</button>
</form>
