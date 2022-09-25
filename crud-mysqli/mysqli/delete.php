<?php
    require_once "./connection.php";

    $nome = "fusca";

    $stmt = $connection->prepare("SELECT * FROM carro WHERE nome = ?");
    $stmt->bind_param("s",$nome);
    //mysqli_stmt_bind_param($stmt,"s",$nome);//outra forma
    $stmt->execute();//mysqli_stmt_execute($stmt); //outra forma
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $id = $result->fetch_array()['id']; //$result = mysqli_fetch_assoc($stmt->get_result()); //outra forma
        $stmt = $connection->prepare("DELETE FROM carro WHERE id = ?");
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            echo "success";
        }
    }

    $stmt->close();
	mysqli_close($conn);//outra forma
?>