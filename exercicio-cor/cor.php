<?php
    $nome = $_POST['texto'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];        
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .texto{
            color: <?php echo $cor ?>;
            font-size: <?php echo $tamanho ?>;
        }
    </style>
</head>
<body>
    <?php
        echo "<span class='texto'>$nome</span>";
    ?>
</body>
</html>
