<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'aula';
    $porta = '3307';

    $conn = new mysqli($servidor, $usuario, $senha, $banco, $porta);
    if(mysqli_connect_errno()){
        trigger_error(mysqli_connect_errno());
    }


?>