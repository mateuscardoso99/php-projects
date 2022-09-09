<?php
    include_once 'conecta.php';

    if(!empty($_POST)){
        if(!empty($_POST['nomeAntigo']) && !empty($_POST['nomeNovo'])){
            $nomeAntigo = $_POST['nomeAntigo'];
            $nomeNovo = $_POST['nomeNovo'];

            $sql = "UPDATE clientes SET nome = '$nomeNovo' WHERE nome = '$nomeAntigo'";
        
            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>";
                echo "alert('Usuario alterado');";
                echo "location.href='index.php'";
                echo "</script>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('Cliente não alterado');";
                echo "location.href='index.php'";
                echo "</script>";
            }

            mysqli_close($conn);
        }
    }

?>