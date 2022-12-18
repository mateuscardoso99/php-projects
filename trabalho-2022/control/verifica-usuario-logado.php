<?php

//pega url atual e depois a pagina e verifica se a pagina que ele que entrar é so pra usuarios logados, ou se e só pra usuarios não logados como o login pro exemplo

$url = $_SERVER['REQUEST_URI'];

$pagina = basename($url);

if(!isset($_SESSION['logado']) || $_SESSION['logado'] != TRUE){
    if(str_starts_with($pagina,'dashboard.php')
        || str_starts_with($pagina,'criarVenda.php')
        || str_starts_with($pagina,'editarVenda.php')
    ){
        header("Location: ../view/index.php");
        exit;
    }
}

elseif(isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE){
    if(str_starts_with($pagina,'index.php')
        || str_starts_with($pagina,'criarConta.php')
    ){
        header("Location: ../view/dashboard.php");
        exit;
    }
}

?>