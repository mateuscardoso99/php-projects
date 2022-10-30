<?php
    require_once "connection.php";

    if(!isset($_SESSION)){
        session_start();
    }

    function cadastrarProduto($descricao, $preco){
        $sql = "INSERT INTO produto(descricao,preco) VALUES ('$descricao', '$preco')";

        getConnection();
        $insert = query($sql);

        if($insert){
            $_SESSION['success'] = 'produto cadastrado com sucesso.';
        }
        else{
            $_SESSION['error'] = 'erro ao cadastrar produto.';
        }

        closeConnection();
    }

    function buscarProdutos(){
        $sql = "SELECT * FROM produto";

        getConnection();
        $query = query($sql);
        closeConnection();

        $produtos = [];

        if(mysqli_num_rows($query) > 0){
            while($linha = mysqli_fetch_assoc($query)){
                array_push($produtos, $linha);
            }
        }

        return $produtos;
    }

    function mostrarProdutoAlterar($id){
        getConnection();
        $sql = query("SELECT * FROM produto WHERE id=$id");
        closeConnection();

        $produto = mysqli_fetch_assoc($sql);
        return $produto;
        //Não precisa do if($sql), pois tem o conteúdo na tabela.
        //Não precisa do while, pois é apenas uma linha
    }

    function alterarProduto($id, $descricao, $preco){
        getConnection();
        $update = query("UPDATE produto SET descricao='$descricao',preco=$preco WHERE id=$id");

        if($update){
            $_SESSION['success'] = 'produto atualizado com sucesso.';
        }
        else{
            $_SESSION['error'] = 'erro ao atualizar produto.';
        }

        closeConnection();
    }

    function excluirProduto($id){
        getConnection();
        $excluir = query("DELETE FROM produto WHERE id=$id");

        if($excluir){
            $_SESSION['success'] = 'produto excluido com sucesso.';
        }
        else{
            $_SESSION['error'] = 'erro ao excluir produto.';
        }
        closeConnection();
    }
?>