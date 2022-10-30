<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>
<body>
    <div>
        <?php
            session_start();
            if(isset($_SESSION['nome'])){
                echo '<h1>bem vindo ',$_SESSION['nome'],'</h1>';
            }
            else{
                header("Location: paginaLogin.php");
            }
        ?>

        <br>
        <a href="controleUsuario.php?opcao=sair">sair</a>
    </div>
</body>
</html>