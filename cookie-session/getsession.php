<?php
session_start();
if(isset($_SESSION['nome'])){
    echo $_SESSION['nome'];
    unset($_SESSION['nome']); //limpa nome da sessao
}
session_start();//apaga toda a sessao
?>