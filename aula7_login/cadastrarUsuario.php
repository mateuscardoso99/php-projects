<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h1>Cadastrar Usuário</h1>

        <form action="controleUsuario.php" method="post">
            <label for="nome">Usuário</label>
            <input type="text" name="nome" id="nome">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            <button type="submit" name="opcao" value="cadastrar">
                Cadastrar usuário
            </button>
        </form>
        <a href="paginaLogin.php">ir para login</a>
    </div>
</body>
</html>