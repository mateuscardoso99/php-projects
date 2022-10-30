<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Cadastrar produto</title>
</head>
<body>

    <?php
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['success'])){
            echo "<p class='success'>".$_SESSION['success']."</p>";
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['error'])){
            echo "<p class='error'>".$_SESSION['error']."</p>";
            unset($_SESSION['error']);
        }
    ?>

    <form action="../control/controleProduto.php" method="post">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input name="descricao" id="descricao" type="text">
        </div>
        
        <div class="form-group">
            <label for="preco">Preço R$:</label>
            <input type="number" name="preco" id="preco" step="0.01">
        </div>

        <button type="submit" name="opcao" value="cadastrar">Salvar</button>
    </form>
    <a href="menu.php">Voltar</a>
</body>
</html>