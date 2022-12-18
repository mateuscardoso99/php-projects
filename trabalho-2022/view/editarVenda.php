<?php
include_once '../model/sessionStart.php';
include_once '../control/verifica-usuario-logado.php';
include_once '../model/crudVenda.php';

if(!isset($_GET['id_venda']) || empty($_GET['id_venda'])){
    header("Location: dashboard.php");
    exit;
}

$venda = buscarVenda($_GET['id_venda'],$_SESSION['id']);

if(!$venda){
    header("Location: dashboard.php");
    exit;   
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Editar Venda</title>
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

            <h1 class="text-center">Editar venda</h1>

            <form class="row g-3 p-3" action="../control/controleVenda.php" method="post">
                <input type="hidden" name="id_venda" value="<?php echo $venda['id'] ?>">
                
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="descricao" class="form-control" name="descricao" id="descricao" value="<?php echo $venda['descricao'] ?>">
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">R$ Total</label>
                    <input type="number" class="form-control" name="total" id="total" step="0.01" value="<?php echo $venda['total'] ?>">
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" value="editar" name="opcao">Salvar</button>
                    <button class="btn btn-danger" type="button" onclick="apagar(<?php echo $venda['id'] ?>)" >Ápagar</button>
                    <a class="btn btn-secondary" href="./dashboard.php">Cancelar</a>
                </div>
            </form>
        </div>

        <div id="modal-apagar" class="modal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Apagar venda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Deseja apagar essa venda?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                <form method="post" action="../control/controleVenda.php">
                    <input type="hidden" id="id_venda_apagar" name="id_venda_apagar">
                    <button id="button-apagar" type="submit" class="btn btn-danger" name="opcao" value="apagar">Apagar</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <script>
        function apagar(id) {
            document.getElementById('id_venda_apagar').value = id
            const myModal = new bootstrap.Modal(document.getElementById('modal-apagar'))
            myModal.show()
        }
    </script>
    </div>
</body>
</html>