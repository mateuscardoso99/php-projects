<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
       label{
        color: blue;
       }
    </style>

</head>
<body>
    <form action="insere.php" method="post">
        <h2 style="color: orange;">CADASTRAR CLIENTE</h2>
        <div>
            <label name="nome">Nome:</label>
            <input type="text" name="nome"/>
        </div>

        
        <div>
            <label name="idade">idade:</label>
            <input type="number" name="idade"/>
        </div>

        <div>
            <label name="cidade">Cidade:</label>
            <input type="text" name="cidade"/>
        </div>



        <div>
            <button type="submit"> Inserir Cliente </button>
        </div>

    </form>

    <form action="altera.php" method="post">
        <h2 style="color: green;">ALTERA DADOS</H2>

        <div>
            <label name="nomeAntigo">Nome Antigo:</label>
            <input type="text" name="nomeAntigo"/>
        </div>

        <div>
            <label name="nomeNovo">Nome Novo:</label>
            <input type="text" name="nomeNovo"/>
        </div>

        <div>
            <button type="submit"> Alterar Cliente </button>
        </div>
    </form>

    <form action="apagar.php" method="post">
        <h2 style="color: red;">APAGAR CLIENTE</H2>

        <div>
            <label name="codigo">Código do cliente: </label>
            <input type="number" name="codigo"/>
        </div>

        <div>
            <button type="submit"> Apagar Cliente </button>
        </div>
    </form>

    <form action="" method="post">
        <h2 style="color: darkgray;">PROCURAR PESSOAS POR NOME</H2>

        <div>
            <label name="nomeProcurar">Nome: </label>
            <input type="text" name="nomeProcurar"/>
        </div>

        <div>
            <button type="submit"> Procurar Cliente </button>
        </div>

    </form>



    <form action="" method="post">
        <h2 style="color: brown;">PROCURAR PESSOAS POR QUALQUER ATRIBUTO</H2>

        <div>
            <label name="procura"> nome, idade ou cidade: </label>
            <input type="text" name="procura"/>
        </div>

        <div>
            <button type="submit"> Procurar Cliente </button>
        </div>

    </form>


    <!-- SELECT -->
    <?php
        include_once 'conecta.php';
        $sql = "SELECT * FROM clientes";
        $resultado = mysqli_query($conn, $sql);

        while($registro = mysqli_fetch_array($resultado)){
            echo "Nome: " .$registro['nome'];
            echo " Idade: " .$registro['idade'];
            echo " Cidade: " .$registro['cidade']. "<br>";
        }

        if(!empty($_POST)){
            if(!empty($_POST['nomeProcurar'])){
                $nomeProcura = $_POST['nomeProcurar'];
    
                $sql = "SELECT * FROM clientes WHERE nome = '$nomeProcura'";
                $resultado = mysqli_query($conn, $sql);

                while($retorno = mysqli_fetch_array($resultado)){
                    echo "<br>";
                    echo "Nome: " .$retorno['nome'];
                    echo " Idade: " .$retorno['idade'];
                    echo " Cidade: " .$retorno['cidade']. "<br>";
                }

            }

        }

        if(!empty($_POST)){
            if(!empty($_POST['procura'])){
                $procura = $_POST['procura'];
    
                $sql = "SELECT * FROM clientes WHERE nome = '$procura'
                OR idade = '$procura' OR cidade = '$procura'";
                $resultado = mysqli_query($conn, $sql);

                while($retorno = mysqli_fetch_array($resultado)){
                    echo "<br>";
                    echo "Nome: " .$retorno['nome'];
                    echo " Idade: " .$retorno['idade'];
                    echo " Cidade: " .$retorno['cidade']. "<br>";
                }

            }

        }
        mysqli_close($conn);



    ?>

</body>
</html>