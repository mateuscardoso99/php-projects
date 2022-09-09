<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="" method="get">
    <h2>Formulário</h2>

    <select name="combobox">
        <option>A</option>
        <option>B</option>
        <option>C</option>
    </select>

        
    <div>
        <label name="consumo"> Consumo: </label>
        <input type="number" name="consumo"/>
    </div>

        <div>
            <button type="submit"> Inserir Usuário </button>
        </div>
    </form>
    
    <?php
        $opcao = $_GET['combobox'];
        $c = $_GET['consumo'];
        switch($opcao){
            case 'A':
                $icms = 1.30*0.70;
                $vf = $c + $icms;
                $vp = $vf + $icms;
                echo "valor a pagar: R$ $vp <br>";
            break;

            case 'B':
                $icms = 1.30*0.40;
                $vf = $c + $icms;
                $vp = $vf + $icms;
                echo "valor a pagar: R$ $vp <br>";
            break;

            case 'C':
                $icms = 1.30*0.30;
                $vf = $c + $icms;
                $vp = $vf + $icms;
                echo "valor a pagar: R$ $vp <br>";
            break;
        }


    ?>

</body>
</html>