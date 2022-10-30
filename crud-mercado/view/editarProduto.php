<?php
    include_once "../model/crudProduto.php";

    if(!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])){
        header("Location: listarProduto.php");
    }

    $id = $_GET["id"];
    $resultado  = mostrarProdutoAlterar($id);

    if(!$resultado){
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['not_found'] = 'produto não encontrado.';
        header("Location: listarProduto.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Controle de Produtos</title>
    </head>
    <body>
        <div>
            <h1>Editar Produto</h1>
            <form method="post" action="../control/controleProduto.php">
                <input type="hidden" name="id" value="<?= $resultado['id'] ?>">

                <label for="descricao">Descrição: </label>
                <input type="text" name="descricao" id="descricao" value="<?=$resultado['descricao'] ?>">

                <label for="preco">Preço: </label>
                <input type="number" step=0.01 name="preco" id="preco"  value="<?=$resultado['preco'] ?>">

                <button type="submit" name="opcao" value="alterar">Salvar</button>
                <button type="submit" name="opcao" value="excluir">Excluir</button>
            </form>

            <a href="mostrarProduto.php">Voltar</a>
        </div>
    </body>
</html>
