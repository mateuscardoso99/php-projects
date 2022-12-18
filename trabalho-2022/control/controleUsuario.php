<?php

include_once '../model/crudUsuario.php';
include_once '../model/sessionStart.php';

$opcao = $_POST['opcao'];

if($opcao == 'cadastro'){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  

    if(!preg_match($pattern,$email)){
        $_SESSION['error'] = 'email inválido, email deve ser ex: joao@gmail.com';
        header("Location: ../view/criarConta.php");
        exit;
    }

    if(empty($senha) || strlen($senha) < 4){
        $_SESSION['error'] = 'senha inválida, senha não pode ser vazia e deve ter no minimo 4 caracteres';
        header("Location: ../view/criarConta.php");
        exit;
    }

    $usuario = buscarUsuario($email);

    if($usuario){
        $_SESSION['error'] = 'Usuário já existe';
        header("Location: ../view/criarConta.php");
        exit;
    }

    $result = cadastrarUsuario($email, password_hash($senha, PASSWORD_BCRYPT));

    if($result){
        $_SESSION['success'] = 'Cadastrado com sucesso';
    }
    else{
        $_SESSION['error'] = 'Erro ao cadastrar usuário';
    }
    header("Location: ../view/criarConta.php");
}

elseif($opcao == 'login'){
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $usuario = buscarUsuario($email);

    if($usuario && password_verify($senha,$usuario['senha'])){
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['logado'] = true;
        header("Location: ../view/dashboard.php");
    }
    else{
        $_SESSION['error'] = 'Email ou senha incorretos';
        header("Location: ../view/index.php");
    }
}

elseif($opcao == 'sair'){
    session_destroy();
    header("Location: ../view/index.php");
}

?>
