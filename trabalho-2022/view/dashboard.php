<?php
include_once '../model/sessionStart.php';
include_once '../control/verifica-usuario-logado.php';
include_once '../model/crudVenda.php';

$vendas = buscarVendasUsuario($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Dashboard</title>
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

        <h3 class="text-center mt-2 mb-4">Bem-vindo <?php echo $_SESSION['email'] ?> </h3>

        <div class="row">
            <a href="criarVenda.php" class="mb-4">Adicionar venda</a>
        </div>
        
        <div class="row">
            
            <?php 
                if(count($vendas) == 0){
                    echo "<p class='text-center'>Nenhuma venda salva.</p>";
                }
                else{ ?>

                    <h5 class="text-left text-light">
                        <span class="badge bg-success">Vendas:</span>
                    </h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Descrição</th>
                                <th scope="col">Total</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($vendas as $venda) { ?>

                                <tr>
                                    <td><?php echo $venda['descricao'] ?></td>
                                    <td><?php echo $venda['total'] ?></td>
                                    <td>
                                        <button onclick="apagar(<?php echo $venda['id'] ?>)" class="btn btn-danger">Apagar</button>
                                        <a href="editarVenda.php?id_venda=<?php echo $venda['id']?>" class="btn btn-warning">Editar</a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

            <?php } ?>

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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script>
        function apagar(id) {
            document.getElementById('id_venda_apagar').value = id
            const myModal = new bootstrap.Modal(document.getElementById('modal-apagar'))
            myModal.show()
        }
    </script>
</body>
</html>