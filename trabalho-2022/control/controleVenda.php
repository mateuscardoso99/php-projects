<?php

include_once '../model/crudVenda.php';
include_once '../model/sessionStart.php';

$opcao = $_POST['opcao'];

if($opcao == 'salvar'){
    $descricao = $_POST['descricao'];
    $total = $_POST['total'];

    if(empty($descricao) || empty($total)){
        $_SESSION['error'] = 'preencha todos os campos';
        header("Location: ../view/criarVenda.php");
        exit;
    }

    $result = cadastrarVenda($descricao, $total, $_SESSION['id']);

    if($result){
        $_SESSION['success'] = 'Cadastrado com sucesso';
    }
    else{
        $_SESSION['error'] = 'Erro ao cadastrar venda';
    }
    header("Location: ../view/criarVenda.php");
}

elseif($opcao == 'editar'){ 

    if(empty($_POST['descricao']) || empty($_POST['total'])){
        $_SESSION['error'] = 'preencha todos os campos';
        header("Location: ../view/editarVenda.php?id_venda=".$_POST['id_venda']);
        exit;
    }

    $venda = array(
        'id' => $_POST['id_venda'],
        'descricao' => $_POST['descricao'],
        'total' => $_POST['total']
    );

    $result = editarVenda($venda, $_SESSION['id']);

    if($result){
        $_SESSION['success'] = 'Salvo com sucesso';
    }
    else{
        $_SESSION['error'] = 'Erro ao salvar venda';
    }
    header("Location: ../view/dashboard.php");
}

elseif($opcao == 'apagar'){
    $result = apagarVenda($_POST['id_venda_apagar'], $_SESSION['id']);

    if($result){
        $_SESSION['success'] = 'Apagado com sucesso';
    }
    else{
        $_SESSION['error'] = 'Erro ao apagar venda';
    }
    header("Location: ../view/dashboard.php");
}

?>