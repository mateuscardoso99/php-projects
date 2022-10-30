<?php
    include_once "../model/crudProduto.php";
    $produtos = buscarProdutos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>
<body>

    <?php
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['not_found'])){
            echo "<h3>produto nao encontrado.</h3>";
            unset($_SESSION['not_found']);
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
    
    <table>
        <thead>
            <th>descricao</th>
            <th>preço</th>
            <th>opções</th>
        </thead>
        <tbody>
            <?php
                foreach($produtos as $prod){
            ?>    
                    <tr> 
                        <td><?php echo $prod['descricao']?></td>
                        <td><?php echo $prod['preco'] ?></td>
                        <td>
                            <a href="editarProduto.php?id=<?php echo $prod['id'] ?>">Editar</a>
                        </td>

                        <?php
                            echo 
                                "<td>
                                    <form method='post' action='../control/controleProduto.php'>
                                        <input type=hidden value=$prod[id] name='id'>
                                        <button type='submit' name='opcao' value='excluir'>
                                            Excluir
                                        </button>
                                    </form>
                                </td>";
                        ?>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <a href="menu.php">Voltar</a>
</body>
</html>