<?php
include_once '../model/sessionStart.php';
include_once '../control/verifica-usuario-logado.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Criar Venda</title>
</head>
<body>
    <?php 
        include_once './header.php';
    ?>

    <div class="container p-3">
        <?php
            if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?php echo $_SESSION['success'] ?>
                </div>

                <?php unset($_SESSION['success']) ?>
        <?php
            }

            if(isset($_SESSION['error'])){ ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <?php echo $_SESSION['error'] ?>
                </div>

                <?php unset($_SESSION['error']) ?>
        <?php
            } ?>

        <div class="row">

            <h1 class="text-center">Criar venda</h1>

            <form class="row g-3 p-3" action="../control/controleVenda.php" method="post">
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="descricao" class="form-control" name="descricao" id="descricao">
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">R$ Total</label>
                    <input type="number" class="form-control" name="total" id="total" step="0.01">
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary mb-3" type="submit" value="salvar" name="opcao">Salvar</button>
                </div>
            </form>
        </div>
        <a href="./dashboard.php">Voltar</a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
</body>
</html>