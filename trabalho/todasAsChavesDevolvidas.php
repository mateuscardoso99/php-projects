<?php
include_once 'banco.php';

    $banco = new Database();
    $banco->ChavesDevolvidas(null);
    $banco->__destruct();
?>
<html>
    <body>
        <div>
            <button onclick="location.href='visualizarInfo.php'">Voltar</button>
        </div> 
    </body>
</html>

