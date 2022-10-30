<?php
    $connection;

    function getConnection(){
        global $connection;
        $connection = mysqli_connect("localhost","root","","supermercado",3306);

        if(mysqli_connect_errno()){
            echo "error connect db error code: ". mysqli_connect_errno() ." error: ". mysqli_connect_error();
            die;
        }
    }

    function query($sql){
        global $connection;
        mysqli_set_charset($connection,"utf8");
        $query = mysqli_query($connection,$sql) or die(mysqli_error($connection));
        return $query;
    }

    function closeConnection(){
        global $connection;
        mysqli_close($connection);
    }
?>