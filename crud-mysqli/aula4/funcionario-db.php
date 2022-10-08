<?php
    $conn = mysqli_connect("localhost", "root", "");

    mysqli_select_db($conn, 'aulas');

    mysqli_query($conn, 'SET CHARACTER SET utf8');
    //mysqli_query($conn,"INSERT INTO funcionario (nome,cargo) VALUES ('teste','gerente')");

    $result = mysqli_query($conn, "SELECT * FROM funcionario");
    
    $dados = [];

    if(mysqli_num_rows($result) > 0){
        while($linha = mysqli_fetch_assoc($result)){
            $dados[] = $linha;
        }    
    }

    //print_r($dados);

    mysqli_query($conn, "UPDATE funcionario SET nome = 'jonas', cargo = 'presidente' WHERE codigo = 148;");

    mysqli_query($conn, "DELETE FROM funcionario WHERE codigo = 144");

    if(isset($_GET['action']) && $_GET['action'] === "apagar" && isset($_GET['codigo']) && !empty($_GET['codigo'])){
        $stmt = mysqli_prepare($conn, "DELETE FROM funcionario WHERE codigo = ?");
        mysqli_stmt_bind_param($stmt, "i", $_GET['codigo']);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('apagado')</script>";
        header("Location: funcionario-db.php");
    }
    else if(isset($_POST['salvar']) && !empty($_POST['nome']) && !empty($_POST['cargo'])){
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];

        $stmt = mysqli_prepare($conn, "INSERT INTO funcionario (nome, cargo) VALUES (?,?)");
        mysqli_stmt_bind_param($stmt,"ss", $nome, $cargo);
        mysqli_stmt_execute($stmt);

        header("Location: funcionario-db.php");
    }
    else if(isset($_POST['atualizar']) && !empty($_POST['update_nome']) && !empty($_POST['update_cargo'])){
        echo "r";
        $codigo = $_POST['id_funcionario'];
        $nome = $_POST['update_nome'];
        $cargo = $_POST['update_cargo'];

        mysqli_query($conn, "UPDATE funcionario SET nome = '$nome', cargo = '$cargo' WHERE codigo = '$codigo'");
        
        header("Location: funcionario-db.php");
    }

    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th{
            background: black;
            color: #fff;
            padding: 10px;
        }
        td{
            text-align: center;
            padding: 10px;
            background: #e7e7e7;
        }
    </style>
</head>
<body>
    <button onclick="criarFuncionario()">criar funcionario</button>
    
    <table>
        <thead>
            <th>codigo</th>
            <th>nome</th>
            <th>cargo</th>
            <th>opcoes</th>
        </thead>
        <tbody>
            <?php foreach($dados as $funcionario) { ?>
                <tr>
                    <td> <?php echo $funcionario['codigo']; ?> </td>
                    <td> <?php echo $funcionario['nome']; ?> </td>
                    <td> <?php echo $funcionario['cargo']; ?> </td>
                    <td>
                        <a href="funcionario-db.php?action=apagar&codigo=<?php echo $funcionario['codigo']; ?>">apagar</a>
                        <button onclick='atualizar(<?php echo json_encode($funcionario); ?>)'>atualizar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div id="criar" style="display: none;">
        <form action="funcionario-db.php" method="post">
            <div style="display: block; margin-bottom: 10px">
                <label for="">nome:</label>
                <input type="text" name="nome" id="">
            </div>

            <div class="display: block; margin-bottom: 10px">
                <label for="">cargo:</label>
                <input type="text" name="cargo" id="">
            </div>

            <button type="submit" name="salvar">salvar</button>
        </form>
    </div>

    <div id="atualizar" style="display: none;">
        <form action="funcionario-db.php" method="post">
            <input type="hidden" name="id_funcionario" id="id_funcionario">

            <div style="display: block; margin-bottom: 10px">
                <label for="">nome:</label>
                <input type="text" name="update_nome" id="update_nome">
            </div>

            <div class="display: block; margin-bottom: 10px">
                <label for="">cargo:</label>
                <input type="text" name="update_cargo" id="update_cargo">
            </div>

            <button type="submit" name="atualizar">salvar</button>
        </form>
    </div>

    <script>
        const criarFuncionario = function(){
            document.getElementById('criar').style.display = "block"
        }
        const atualizar = (funcionario) => {
            document.getElementById('id_funcionario').value = funcionario.codigo
            document.getElementById('update_nome').value = funcionario.nome
            document.getElementById('update_cargo').value = funcionario.cargo
            document.getElementById('atualizar').style.display = 'block'
        }
    </script>
</body>
</html>

