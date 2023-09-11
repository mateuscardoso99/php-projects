<?php
$conn=mysqli_connect("localhost","root","","mercado","3306");
$q1 = $conn->query("select * from funcionario");
$q2 = mysqli_query($conn,"select * from funcionario");//mesma coisa da linha 3

print_r($q1);
echo '<br>';
print_r($q2);
echo '<br>';

/*
mysqli_fetch_array():
Array ( 
    [0] => Array ( 
          [0] => 1 [codigo] => 1 
          [1] => joao [nome] => joao 
          [2] => cargo1 [cargo] => cargo1 
        )
    [1] => Array ( 
          [0] => 2 [codigo] => 2 
          [1] => maria [nome] => maria 
          [2] => cargo2 [cargo] => cargo2
        )
)
*/

/*
mysqli_fetch_assoc():
Array ( 
    [0] => Array ( 
            [codigo] => 1 
            [nome] => joao 
            [cargo] => cargo1 
        ) 
    [1] => Array ( 
            [codigo] => 2 
            [nome] => maria 
            [cargo] => cargo2 
        )
)
*/

$r1 = array();
while($row = mysqli_fetch_assoc($q1)){
    array_push($r1,$row);
}
print_r($r1);
echo '<br>';

$r2 = [];
foreach($q1 as $k){
    $r2[] = $k;
}

//linhas 12 e 19 produzem o mesmo resultado

print_r($r2);
echo '<br>';

$linhas_tabela = '';

foreach($r2 as $v){
    $linhas_tabela .= '<tr><td>'.$v['nome'].'</td><td>'.$v['cargo'].'</td></tr>';
}

echo '<table>
        <thead>
            <th>nome</th>
            <th>cargo</th>
        </thead>
        <tbody>'
            .$linhas_tabela.
        '</tbody>
    </table>';
?>
