<?php
include_once 'banco.php';
    if(!empty($_POST['nome'] && $_POST['cpf'])){
        if(isset($_POST['btInserirPassageiro'])){
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "./";
        move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$novo_nome);

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $valores = "'" . $nome . "'," . $cpf . ",'" . $novo_nome . "'";
        $banco = new Database();
        $banco->inserir("passageiro","nome, cpf, foto", $valores);
        $banco->__destruct();
    }
}


if($_POST){
    if(isset($_POST['btInserirVoo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "./";
    move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$novo_nome);
  
    $partida = $_POST['partida'];
    $destino = $_POST['destino'];
    $aviao = $_POST['aviao'];
    $distancia = $_POST['distancia'];
    $valores = "'" . $partida . "','" . $destino . "','" . $aviao . "','" . $distancia . "','" . $novo_nome . "'";
    $banco = new Database();
    $banco->inserir("voo","partida, destino, aviao, distancia, foto", $valores);
    $banco->__destruct();
    }
}


if(!empty($_POST['idpassageiro']) && !empty($_POST['idvoo'])){
    $idp = $_POST['idpassageiro'];
    $idv = $_POST['idvoo'];

    $valores = $idp . "," . $idv;
    $banco = new Database();
    $banco->inserir("voopassageiros","idpassageiros, idvoo", $valores);
    $banco->__destruct();
}

?>