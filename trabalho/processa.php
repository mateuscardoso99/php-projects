<?php
    include_once 'professor.php';
    include_once 'aluno.php';
    include_once 'porteiro.php';
    include_once 'chave.php';
    include_once 'banco.php';

    if(!empty($_POST['nomePorteiro'])){
        $nome = $_POST['nomePorteiro'];
            $p = new Porteiro($nome);
            $p->inserir();
    }
    
    if(!empty($_POST['comboboxExcluirPorteiro'])){
        $id = $_POST['comboboxExcluirPorteiro'];
            Porteiro::apagar($id);
    }
    
    if(!empty($_POST['comboboxAtualizarPorteiro']) && !empty($_POST['nomenovo'])){
        $id = $_POST['comboboxAtualizarPorteiro'];
        $nome = $_POST['nomenovo'];
            $p = new Porteiro($nome);
            $p->atualizar("nome", $nome, $id);
    }
    
    if(!empty($_POST['comboboxDesativarPorteiro'])){
        $id = $_POST['comboboxDesativarPorteiro'];
            Porteiro::desativar($id);
    }
    
    if(!empty($_POST['comboboxAtivarPorteiro'])){
        $id = $_POST['comboboxAtivarPorteiro'];
            Porteiro::ativar($id);
    }
    
    
    ////////////////////////////////PROFESSORES////////////////////////////////////////////////////
    
    
    
    
    if(!empty($_POST['nomeprofessor']) && !empty($_POST['graduacao'])){
        $nome = $_POST['nomeprofessor'];
        $graduacao = $_POST['graduacao'];
            $p = new Professor($nome, $graduacao);
            $p->inserir();
    }
    
    if(!empty($_POST['comboboxExcluirProfessor'])){
        $id = $_POST['comboboxExcluirProfessor'];
        Professor::apagar($id);
    }
    
    if(!empty($_POST['comboboxAtualizarProfessor'])){
        $id = $_POST['comboboxAtualizarProfessor'];
        if($_POST['opcoesProfessor'] == 'Nome' && !empty($_POST['dadonovo'])){
            $campo = "nome";
            $valor = $_POST['dadonovo'];
            Professor::atualizar($campo, $valor, $id);
        }else if($_POST['opcoesProfessor'] == 'Graduação' && !empty($_POST['dadonovo'])){
            $campo = "graduacao";
            $valor = $_POST['dadonovo'];
            Professor::atualizar($campo, $valor, $id);
        }
    }
    
    if(!empty($_POST['comboboxDesativarProfessor'])){
        $id = $_POST['comboboxDesativarProfessor'];
            Professor::desativar($id);
    }
    
    if(!empty($_POST['comboboxAtivarProfessor'])){
        $id = $_POST['comboboxAtivarProfessor'];
            Professor::ativar($id);
    }
    
    
///////////////////////////////////////////ALUNOS////////////////////////////////////// 
    
    
    
    if(!empty($_POST['nomealuno']) && !empty($_POST['curso']) && !empty($_POST['comboboxProfessorResp'])){
        $nome = $_POST['nomealuno'];
        $curso = $_POST['curso'];
        $id = $_POST['comboboxProfessorResp'];
        $aluno = new Aluno($nome, $curso, $id);
        $aluno->inserir();
    }
    
    if(!empty($_POST['comboboxExcluirAluno'])){
        $id = $_POST['comboboxExcluirAluno'];
        Aluno::apagar($id);
    }
    
    if(!empty($_POST['comboboxAtualizarAluno'])){
        $id = $_POST['comboboxAtualizarAluno'];
        if($_POST['opcoesAluno'] == 'Nome' && !empty($_POST['dadonovo'])){
            $campo = "nome";
            $valor = $_POST['dadonovo'];
            Aluno::atualizar($campo, $valor, $id);
        }else if($_POST['opcoesAluno'] == 'Curso' && !empty($_POST['dadonovo'])){
            $campo = "curso";
            $valor = $_POST['dadonovo'];
            Aluno::atualizar($campo, $valor, $id);
        }
    }
    
    if(!empty($_POST['comboboxDesativarAluno'])){
        $id = $_POST['comboboxDesativarAluno'];
            Aluno::desativar($id);
    }
    
    if(!empty($_POST['comboboxAtivarAluno'])){
        $id = $_POST['comboboxAtivarAluno'];
            Aluno::ativar($id);
    }
    
    
////////////////////////////////////////////CHAVES//////////////////////////////////////////////////
    
    
    if(!empty($_POST['sala']) && !empty($_POST['comboboxChavePorteiro'])){
        $sala = $_POST['sala'];
        $idporteiro = $_POST['comboboxChavePorteiro'];
            $c = new Chave($sala,$idporteiro);
            $c->inserir();
    }
    
    if(!empty($_POST['comboboxAtualizarChave']) && !empty($_POST['dadonovo'])){
        $id = $_POST['comboboxAtualizarChave'];
        $campo = "sala";
        $valor = $_POST['dadonovo'];
            Chave::atualizar($campo, $valor, $id);
    }
    
    if(!empty($_POST['comboboxExcluirChave'])){
        $id = $_POST['comboboxExcluirChave'];
            Chave::apagar($id);
    }
    
    if(!empty($_POST['comboboxLiberarChave']) && !empty($_POST['comboboxChavePorteiroLiberarAula']) && !empty($_POST['dataliberacao'])){
        if($_POST['comboboxProfessorResponsavel'] != 'Nenhum' && $_POST['comboboxAlunoResponsavel'] != 'Nenhum'){
            $idchave = $_POST['comboboxLiberarChave'];
            $idprof = $_POST['comboboxProfessorResponsavel'];
            $idaluno = $_POST['comboboxAlunoResponsavel'];
            $data = $_POST['dataliberacao'];
            $idporteiro = $_POST['comboboxChavePorteiroLiberarAula'];
            Chave::liberarChave($idchave, $idprof, $idaluno, $data, $idporteiro);
            Chave::atualizar("situacao", "ocupada", $idchave);
        }
        
        else if($_POST['comboboxProfessorResponsavel'] == 'Nenhum' && $_POST['comboboxAlunoResponsavel'] != 'Nenhum'){
            $idaluno = $_POST['comboboxAlunoResponsavel'];
            $idchave = $_POST['comboboxLiberarChave'];
            $idprof = "null";
            $data = $_POST['dataliberacao'];
            $idporteiro = $_POST['comboboxChavePorteiroLiberarAula'];
            Chave::liberarChave($idchave, $idprof, $idaluno, $data, $idporteiro);
            Chave::atualizar("situacao", "ocupada", $idchave);
        }
        
        else if($_POST['comboboxProfessorResponsavel'] != 'Nenhum' && $_POST['comboboxAlunoResponsavel'] == 'Nenhum'){
            $idprof = $_POST['comboboxProfessorResponsavel'];
            $idchave = $_POST['comboboxLiberarChave'];            
            $idaluno = "null";
            $data = $_POST['dataliberacao'];
            $idporteiro = $_POST['comboboxChavePorteiroLiberarAula'];
            Chave::liberarChave($idchave, $idprof, $idaluno, $data, $idporteiro);
            Chave::atualizar("situacao", "ocupada", $idchave);
        }
        else if($_POST['comboboxProfessorResponsavel'] == 'Nenhum' && $_POST['comboboxAlunoResponsavel'] == 'Nenhum'){
            echo "<script>alert('é preciso ter um responsável para iniciar uma aula')</script>";
        }
    } 
    
    if(!empty($_POST['comboboxDevolverChave']) && !empty($_POST['dataentrega'])){
        $idchave = $_POST['comboboxDevolverChave'];
        $data = $_POST['dataentrega'];
        Chave::devolverChave($data, $idchave);
        Chave::atualizar("situacao", "liberada", $idchave);   
    }
    
?>

    
        
<html>
    <script>
        function redirecionar(){
            location.href="index.php";
        }
    </script>
    <button type="submit" onclick="redirecionar()">Voltar</button>       
</html>
