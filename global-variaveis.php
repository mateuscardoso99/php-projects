<?php

$GLOBALS['t'] = 67; //variavel global php
$GLOBALS['teste'] = 'teste';

echo $GLOBALS['t'], $GLOBALS['teste'];

function h(){
    echo $GLOBALS['t'];
}

h();

include_once './env.php';
echo $_ENV['g'];
?>