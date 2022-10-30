<?php
    $conection;
    function connect() {
        global $conection;
        $server = 'localhost';
        $root = 'root';
        $password='';
        $dataBase='login';
        $conection = mysqli_connect($server,$root,$password,$dataBase) or die(mysqli_connect_error());
    }

    function query($sql) {
        global $conection;
        mysqli_query($conection,"SET CHARACTER SET utf8");
        $query = mysqli_query($conection, $sql) or die(mysqli_error($conection));
        return $query;

    }

    function close() {
        global $conection;
        mysqli_close($conection);
    }
