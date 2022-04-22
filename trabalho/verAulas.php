<?php
    include_once 'banco.php';

    echo "TODAS AS AULAS: <br><br>";   
    $banco = new Database();  
    $banco->visualizarAulas();
?>
<html>
    <body>
        <div>
            <button onclick="location.href='index.php'">Voltar</button>
        </div>
    </body>
</html>
