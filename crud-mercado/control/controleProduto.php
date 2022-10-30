<?php
    include_once "../model/crudProduto.php";

    $opcao = $_POST['opcao'];

    switch($opcao){
        case 'cadastrar':{
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            cadastrarProduto($descricao, $preco);
            header("Location: ../view/cadastroProduto.php");
            break;
        }
        case 'alterar':{
            $id = $_POST['id'];
            $descricao = $_POST["descricao"];
            $preco = $_POST["preco"];
            alterarProduto($id, $descricao, $preco);
            header("Location: ../view/listarProduto.php");
            break;
        }
        case 'excluir':{
            $id = $_POST['id'];
            excluirProduto($id);
            header("Location: ../view/listarProduto.php");
            break;
        }    
    }
?>
