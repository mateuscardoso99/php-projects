<?php
    require_once "./connection.php";

    $nome = "fusca";
    $marca = "volkswagem";
    $cor = "branco";

    $stmt = $connection->prepare("INSERT INTO carro (nome,marca,cor) VALUES(?,?,?);");
    $stmt->bind_param("sss",$nome,$marca,$cor);

    if($stmt->execute()){
        echo "success";
    }

    $stmt->close();


    /*
    mysql_fetch_array:

        $row=mysql_fetch_array($query);
        var_dump($row);

        Resultado:
        array
        0 => string '1' (length=1)
        'id' => string '1' (length=1)
        1 => string '1' (length=1)
        'createdBy' => string '1' (length=1)
        2 => string 'APTITUDE' (length=8)
        'catName' => string 'APTITUDE' (length=8)
        3 => string 'APTITUDE' (length=8)
        'description' => string 'APTITUDE' (length=8)
        4 => string '1' (length=1)
        'status' => string '1' (length=1)


    mysql_fetch_row:

        $row=mysql_fetch_row($query);
        var_dump($row);

        Resultado:
        array
        0 => string '1' (length=1)
        1 => string '1' (length=1)
        2 => string 'APTITUDE' (length=8)
        3 => string 'APTITUDE' (length=8)
        4 => string '1' (length=1)


    mysql_fetch_assoc:

        $row=mysql_fetch_assoc($query);
        var_dump($row);

        Resultado:
        array
        'id' => string '1' (length=1)
        'createdBy' => string '1' (length=1)
        'catName' => string 'APTITUDE' (length=8)
        'description' => string 'APTITUDE' (length=8)
        'status' => string '1' (length=1)


    mysql_fetch_object:

        $row=mysql_fetch_object($query);
        var_dump($row);

        Resultado:
        object(stdClass)[2]
        public 'id' => string '1' (length=1)
        public 'createdBy' => string '1' (length=1)
        public 'catName' => string 'APTITUDE' (length=8)
        public 'description' => string 'APTITUDE' (length=8)
        public 'status' => string '1' (length=1)
     */


    /*

    PDO::fetchAll
    Busque todas as linhas restantes no conjunto de resultados:
    Array
    (
        [0] => Array
            (
                [name] => apple
                [0] => apple
                [colour] => red
                [1] => red
            )

        [1] => Array
            (
                [name] => pear
                [0] => pear
                [colour] => green
                [1] => green
            )

        [2] => Array
            (
                [name] => watermelon
                [0] => watermelon
                [colour] => pink
                [1] => pink
            )

    )


    PDO::FETCH_ASSOC: Retorna a próxima linha como um array indexado pelo nome da coluna
    Array
    (
        [name] => apple
        [colour] => red
    )

    PDO::FETCH_BOTH: Retorna a próxima linha como uma matriz indexada pelo nome e número da coluna
    Array
    (
        [name] => banana
        [0] => banana
        [colour] => yellow
        [1] => yellow
    )

    PDO::FETCH_LAZY: Retorna a próxima linha como um objeto anônimo com nomes de colunas como propriedades
    PDORow Object
    (
        [name] => orange
        [colour] => orange
    )

    PDO::FETCH_OBJ: Retorna a próxima linha como um objeto anônimo com nomes de colunas como propriedades
    kiwi        
    
    */
?>
