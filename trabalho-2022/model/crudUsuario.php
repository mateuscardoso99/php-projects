<?php

include_once 'connection.php';

function cadastrarUsuario($email, $senha){
    connection();
    $sql = "INSERT INTO usuario (email,senha) VALUES ('$email','$senha')";
    $result = query($sql);
    return $result;
}

function buscarUsuario($email){
    connection();
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $consulta = query($sql);
    return mysqli_fetch_assoc($consulta);
}

?>