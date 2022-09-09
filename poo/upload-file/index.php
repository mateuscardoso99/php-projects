<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="js/hello.js"></script>
</head>
<body>

    <form action="processa.php" method=post>
    <div>
        <label>NOME:</label>
        <input type="text" name="nome" required/>
    <div>
    <div>
        <label>CPF:</label>
        <input type="text" name="cpf" required/>
    </div>

    <div>
        FOTO: <input type="file" require name="arquivo">
    </div>

        <button type="submit" name="btInserirPassageiro">INSERIR</button>
    </form>






    <form action="processa.php" method=post>
    <div>
        <label>AVIÃO:</label>
        <input type="text" name="aviao" required/>
    </DIV>

    <div>
        <label>PARTIDA:</label>
        <input type="text" name="partida" required/>
    </DIV>

    <div>
        <label>DESTINO:</label>
        <input type="text" name="destino" required/>
    </DIV>

    <div>
        <label>DISTÂNCIA:</label>
        <input type="text" name="distancia" required/>
    </div>

    <div>
        FOTO: <input type="file" require name="arquivo">
    </div>

        <button type="submit" name="btInserirVoo">INSERIR</button>
    </form>

</body>

    <form action="processa.php" method="post">
        <div>
            <label>inserir passageiro por id:</label>
            <input type="number" name="idpassageiro" required/>
        </DIV>

        <div>
            <label>id do voo:</label>
            <input type="number" name="idvoo" required/>
        </DIV>

        <button type="submit" name="inseir">INSERIR</button>

    </form>
</html>