<?php
include_once 'banco.php';
        
    if(!empty($_GET['comboboxChavesDevolvidas'])){
        $id = $_GET['comboboxChavesDevolvidas'];
        $banco = new Database();
        $banco->ChavesDevolvidas($id);
    }
    
    if(!empty($_GET['comboboxAlunos'])){
        $id = $_GET['comboboxAlunos'];
        $banco = new Database();
        $resultado = $banco->chavesPorAluno($id);
        foreach($resultado as $r){
            echo "Nome do Aluno: " .$r['nome'];
            echo ", Chave: " .$r['sala'];
            echo ", Data de aquisição: " .$r['datainicio'];
            echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
        }
    }
    
    if(!empty($_GET['comboboxProfessores'])){
        $id = $_GET['comboboxProfessores'];
        $banco = new Database();
        $resultado = $banco->chavesPorProfessor($id);
        foreach($resultado as $r){
            echo "Nome do Professor: " .$r['nome'];
            echo ", Chave: " .$r['sala'];
            echo ", Data de aquisição: " .$r['datainicio'];
            echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
        }
    }
    
    $banco->__destruct();
    
?>
<html>
    <body>
        <div>
            <button onclick="location.href='visualizarInfo.php'">Voltar</button>
        </div>
    </body>
</html>
