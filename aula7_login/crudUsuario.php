<?php

include_once 'conexaoBD.php';

function cadastrarUsuario($nome, $senha){
    connect();
    query("INSERT INTO usuario (nome,senha) VALUES ('$nome','$senha')");
    close();
}

function buscarUsuario($nome){
    connect();
    $consulta = query("SELECT * FROM usuario WHERE nome = '$nome'");
    close();
    $resultadoSeparado = mysqli_fetch_assoc($consulta);
    return $resultadoSeparado;
}

?>