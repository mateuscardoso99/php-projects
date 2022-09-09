<?php
    include_once 'conecta.php';

    if(!empty($_POST)){
        if(!empty($_POST['nome']) && !empty($_POST['idade']) && !empty($_POST['cidade'])){
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $cidade = $_POST['cidade'];

            $sql = "INSERT INTO clientes (nome, idade, cidade) 
            VALUES ('$nome','$idade','$cidade');";

            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>";
                echo "alert('Registro incluido');";
                echo "location.href='index.php'";
                echo "</script>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('Cliente não incluido');";
                echo "location.href='index.php'";
                echo "</script>";
            }

            mysqli_close($conn);
        }
        
    }


?>