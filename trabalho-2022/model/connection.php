<?php

$conexao;

function connection(){
    global $conexao;
    $server = 'localhost';
    $user = 'root';
    $password='';
    $db = 'trabalho-mateus';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conexao = mysqli_connect($server,$user,$password,$db) or die(mysqli_connect_error());
}

function query($sql){
    global $conexao;
    mysqli_query($conexao,'SET CHARACTER SET utf8');
    $resultSet = mysqli_query($conexao,$sql);
    mysqli_close($conexao);
    return $resultSet;
}

?>
