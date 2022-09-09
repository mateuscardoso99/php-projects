<?php
    include_once 'conecta.php';

    if(!empty($_POST)){
        if(!empty($_POST['codigo'])){
            $codigo = $_POST['codigo'];

            $sql = "DELETE FROM clientes WHERE id = '$codigo'";
        
            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>";
                echo "alert('Usuario apagado');";
                echo "location.href='index.php'";
                echo "</script>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('Não foi possível remover');";
                echo "location.href='index.php'";
                echo "</script>";
            }

            mysqli_close($conn);
        }
    }

?>