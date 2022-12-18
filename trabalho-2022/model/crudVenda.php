<?php

include_once 'connection.php';

function cadastrarVenda($descricao,$total,$usuario){
    connection();
    $sql = "INSERT INTO venda (descricao,total,id_usuario) VALUES ('$descricao',$total,$usuario)";
    $result = query($sql);
    return $result;
}

function buscarVendasUsuario($usuario){
    connection();
    $sql = "SELECT venda.* FROM venda JOIN usuario ON venda.id_usuario = usuario.id WHERE venda.id_usuario = $usuario";
    $consulta = query($sql);

    $vendas = [];

    while($row = mysqli_fetch_assoc($consulta)){
        array_push($vendas, $row);
    }
    
    return $vendas;
}

function buscarVenda($id_venda,$usuario){
    connection();
    $sql = "SELECT * FROM venda WHERE id = $id_venda AND id_usuario = $usuario";
    $consulta = query($sql);
    return mysqli_fetch_assoc($consulta);
}

function editarVenda($venda,$usuario){
    connection();
    $descricao = $venda['descricao'];

    $sql = "UPDATE venda SET descricao = '$descricao', total = ".$venda['total']." WHERE id = ".$venda['id']." AND id_usuario = $usuario";
    $update = query($sql);
    return $update;
}

function apagarVenda($id_venda,$usuario){
    connection();
    $sql = "DELETE FROM venda WHERE id = $id_venda AND id_usuario = $usuario";
    $update = query($sql);
    return $update;
}

?>