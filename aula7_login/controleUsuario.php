<?php

include_once 'crudUsuario.php';

if(isset($_POST['opcao'])){
    $opcao = $_POST['opcao'];
}
else{
    $opcao = $_GET['opcao'];
}

if($opcao == 'cadastrar'){
    cadastrarUsuario($_POST['nome'], sha1($_POST['senha']));
    header("Location: cadastrarUsuario.php");
}
elseif($opcao == 'entrar'){
    $nome = $_POST['nome'];
    $senha = sha1($_POST['senha']);
    $banco = buscarUsuario($nome);
    if($nome === $banco['nome']){
        if($senha === $banco['senha']){
            session_start();
            $_SESSION['nome'] = $nome;
            header("Location: paginaPrincipal.php");
        }
        else{
            echo"<script>alert('senha incorreta')</script>";
            echo"<script>window.location='paginaLogin.php'</script>";
        }
    }
    else{
        echo"<script>alert('nome invalido')</script>";
        echo"<script>window.location='paginaLogin.php'</script>";//se usasse header ele sobrescreveria o alert e na ia aparecer
    }
}
elseif($opcao == 'sair'){
    session_start();
    session_destroy();
    echo"<script>alert('destruiu a sessão')</script>";
    echo"<script>window.location='paginaLogin.php'</script>";
}

?>