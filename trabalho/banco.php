<?php
    class Database {
        private $host = 'localhost';
        private $port = 3306;
        private $usuario = '';
        private $senha = '';
        private $banco = '';
        public $conn;

        function __construct(){
            try{
                $this->conn = new PDO("mysql:host=$this->host;
                                     port=$this->port;
                                     dbname=$this->banco",
                                     "$this->usuario",
                                     "$this->senha");
                return true;

            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }    
        }

        function __destruct(){
            $this->conn = null;
        }
////////////////////////CRUD//////////////////////////////////////////////////
        function inserir($tabela, $campos, $valores){
            $sql = "INSERT INTO $tabela($campos) VALUES ($valores)";
            try{
                $this->conn->exec($sql);
                echo "<script> alert('inserido com sucesso') </script>";
                
            } catch(PDOException $e){
                echo "<script> alert('erro ao inserir') </script>";
                echo $e->getMessage();
                return false;
            } 
        }

        function update($tabela, $campo, $valor, $id){
            $sql = "UPDATE $tabela SET $campo='$valor' WHERE id=$id";
            try{
                $this->conn->exec($sql);
                echo "<script> alert('atualizado com sucesso') </script>";
            } catch(PDOException $e){
                echo "<script> alert('não foi possível atualizar') </script>";
                echo $e->getMessage();
                return false;
            } 
        }
        
        function delete($tabela, $campo, $where){
            $sql = "DELETE FROM $tabela WHERE $campo=$where";
            try{
                $this->conn->exec($sql);
                echo "<script> alert('apagado com sucesso') </script>";
                
            } catch(PDOException $e){
                echo "<script> alert('não foi possível excluir') </script>";
                echo $e->getMessage();
                return false;
            } 
        }

        function read($tabela, $where){
            if($where != null){
                $sql = "SELECT * FROM $tabela WHERE situacao='$where'";
            } else {
                $sql = "SELECT * FROM $tabela";
            }
            $result = $this->conn->query($sql);
            if($result){
                return $result;
            } else {
                return false;
            }
        }
        
        
////////////////////CADATROS/////////////////////////////////////////////        
        function desativarCadastros($tabela, $id){
            $sql = "UPDATE $tabela SET situacao = 'desativado' WHERE id=$id";
            try{
                $this->conn->exec($sql);
                echo "<script> alert('cadastro desativado com sucesso') </script>";
            } catch(PDOException $e){
                echo "<script> alert('não foi possível desativar o cadastro') </script>";
                echo $e->getMessage();
                return false;
            } 
        }
        
        function ativarCadastros($tabela, $id){
            $sql = "UPDATE $tabela SET situacao = 'ativado' WHERE id=$id";
            try{
                $this->conn->exec($sql);
                echo "<script> alert('cadastro ativado com sucesso') </script>";
            } catch(PDOException $e){
                echo "<script> alert('não foi possível ativar o cadastro') </script>";
                echo $e->getMessage();
                return false;
            } 
        }
        
       /* function verificarCadastros($tabela, $id){
            $sql = "SELECT nome FROM $tabela WHERE id=$id AND situacao = 'ativado'";
            $resultado = $this->conn->query($sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
        }*/
        
 //////////////////////////MANIPULAÇÃO DE AULAS//////////////////////////////////////////////       
        function fecharAula($data, $idchave){
            $sql = "UPDATE aula SET datafim  = $data, status = 'encerrada' WHERE idchave=$idchave";
            try{
                $this->conn->exec($sql);
                echo "<script> alert('aula finalizada com sucesso') </script>";
                
            } catch(PDOException $e){
                echo "<script> alert('não foi possível finalizar a aula') </script>";
                echo $e->getMessage();
                return false;
            } 
        }
        
        function visualizarAulas(){
            $sql = "SELECT chave.sala, professor.nome, datainicio, datafim, status FROM chave"
                    . " INNER JOIN aula ON(aula.idchave=chave.id)"
                    . " INNER JOIN professor ON(aula.idprofessor=professor.id) WHERE aula.idaluno IS NULL";
            $result = $this->conn->query($sql);
            echo "AULAS SOB RESPONSABILIDADE DOS PROFESSORES:<BR><BR>";
            foreach($result as $r){
            echo "Chave: " .$r['sala'];
            echo ", Responsável: " .$r['nome'];
            echo ", Data de Início: " .$r['datainicio'];
            echo ", Data de Término: " .$r['datafim'];
            echo ", Situação: " .$r['status'].'<br>'.'<br>';
            }
            
            $sql2 = "SELECT chave.sala, aluno.nome, datainicio, datafim, status FROM chave"
                    . " INNER JOIN aula ON(aula.idchave=chave.id)"
                    . " INNER JOIN aluno ON(aula.idaluno=aluno.id) WHERE aula.idprofessor IS NULL";
            $result = $this->conn->query($sql2);
            echo "<BR><BR>AULAS SOB RESPONSABILIDADE DOS ALUNOS:<BR><BR>";
            foreach($result as $r){
            echo "Chave: " .$r['sala'];
            echo ", Responsável: " .$r['nome'];
            echo ", Data de Início: " .$r['datainicio'];
            echo ", Data de Término: " .$r['datafim'];
            echo ", Situação: " .$r['status'].'<br>'.'<br>';
            }
            
            
            $sql3 = "SELECT chave.sala, aluno.nome as nomea, professor.nome as nomep, datainicio, datafim, status FROM chave "
                    . "INNER JOIN aula ON(aula.idchave=chave.id) "
                    . "INNER JOIN aluno ON(aula.idaluno=aluno.id) "
                    . "INNER JOIN professor ON(aula.idprofessor=professor.id) ORDER BY aula.id";
            $result = $this->conn->query($sql3);
            echo "<BR><BR>AULAS SOB RESPONSABILIDADE DE PROFESSORES E ALUNOS:<BR><BR>";
            foreach($result as $r){
            echo "Chave: " .$r['sala'];
            echo ", Aluno Responsável: " .$r['nomea'];
            echo ", Professor Responsável: " .$r['nomep'];
            echo ", Data de Início: " .$r['datainicio'];
            echo ", Data de Término: " .$r['datafim'];
            echo ", Situação: " .$r['status'].'<br>'.'<br>';
            }
                      
        }
/////////////////////////////////////CHAVES/////////////////////////////////////
        function chavesPorAluno($id){
            $sql = "SELECT chave.sala, datainicio, datafim, aluno.nome FROM chave "
                    . "INNER JOIN aula ON(aula.idchave=chave.id)"
                    . "INNER JOIN aluno ON(aula.idaluno=aluno.id)"
                    . "WHERE aluno.id = $id";
            $result = $this->conn->query($sql);
            if($result){
                return $result;
            } else {
                return false;
            }
        }
        function chavesPorProfessor($id){
            $sql = "SELECT chave.sala, datainicio, datafim, professor.nome FROM chave "
                    . "INNER JOIN aula ON(aula.idchave=chave.id)"
                    . "INNER JOIN professor ON(aula.idprofessor=professor.id)"
                    . "WHERE professor.id = $id";
            $result = $this->conn->query($sql);
            if($result){
                return $result;
            } else {
                return false;
            }
        }
        
        function ChavesOcupadas(){
            $sql = "SELECT chave.sala, aluno.nome as na, professor.nome as np FROM chave"
                    . " INNER JOIN aula ON(chave.id=aula.idchave)"
                    . "INNER JOIN aluno ON(aula.idaluno=aluno.id)"
                    . "INNER JOIN professor ON(aula.idprofessor=professor.id)"
                    . "WHERE status='em andamento' ";
                $result = $this->conn->query($sql);
                echo "<BR><BR>CHAVES OCUPADAS POR PROFESSORES E ALUNOS:<BR>";
                    foreach($result as $r){
                        echo "Chave: " .$r['sala'];
                        echo ", Responsável: " .$r['na'];
                        echo ", Responsável: " .$r['np'].'<br>';
                    }
                    
            $sql2 = "SELECT chave.sala, aluno.nome, aluno.curso FROM chave"
                    . " INNER JOIN aula ON(chave.id=aula.idchave)"
                    . "INNER JOIN aluno ON(aula.idaluno=aluno.id)"
                    . "WHERE aula.status='em andamento'"
                    . "AND aula.idprofessor IS NULL";
                 $result = $this->conn->query($sql2);
                 echo "<BR>CHAVES OCUPADAS POR ALUNOS:<BR>";   
                    foreach($result as $r){
                        echo "Chave: " .$r['sala'];
                        echo ", Aluno Responsável: " .$r['nome'];
                        echo ", Curso: " .$r['curso'].'<br>';
                    }
                    
                $sql3 = "SELECT chave.sala, professor.nome, professor.graduacao FROM chave"
                    . " INNER JOIN aula ON(chave.id=aula.idchave)"
                    . "INNER JOIN professor ON(aula.idprofessor=professor.id)"
                    . "WHERE aula.status='em andamento'"
                    . "AND aula.idaluno IS NULL";
                 $result = $this->conn->query($sql3);
                 echo "<BR>CHAVES OCUPADAS POR PROFESSORES:<BR>";   
                    foreach($result as $r){
                        echo "Chave: " .$r['sala'];
                        echo ", Professor Responsável: " .$r['nome'];
                        echo ", Graduação: " .$r['graduacao'].'<br>'.'<br>';
                    }                   
        }
        
        function ChavesDevolvidas($id){
            if($id != null){
                $sql = "SELECT chave.sala, aluno.nome, aula.datainicio, aula.datafim FROM chave "
                        . "INNER JOIN aula ON(aula.idchave=chave.id) "
                        . "INNER JOIN aluno ON(aula.idaluno=aluno.id) "
                        . "WHERE aula.status='encerrada' AND aula.idprofessor IS NULL "
                        . "AND aula.idchave=$id";
                $resultado = $this->conn->query($sql);
                echo "<br><br>ALUNOS QUE JÁ DEVOLVERAM ESSA CHAVE:<BR><br>";
                foreach($resultado as $r){
                    echo "Chave: " .$r['sala'];
                    echo ", Aluno: " .$r['nome'];
                    echo ", Data de aquisição: " .$r['datainicio'];
                    echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
                }                
                                
                $sql11 = "SELECT chave.sala, professor.nome, aula.datainicio, aula.datafim FROM chave "
                        . "INNER JOIN aula ON(aula.idchave=chave.id) "
                        . "INNER JOIN professor ON(aula.idprofessor=professor.id) "
                        . "WHERE aula.status='encerrada' AND aula.idaluno IS NULL "
                        . "AND aula.idchave=$id";
                $resultado = $this->conn->query($sql11);
                echo "<br><br>PROFESSORES QUE JÁ DEVOLVERAM ESSA CHAVE:<BR><br>";
                foreach($resultado as $r){
                    echo "Chave: " .$r['sala'];
                    echo ", Professor: " .$r['nome'];
                    echo ", Data de aquisição: " .$r['datainicio'];
                    echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
                }
                                                                                
                $sql12 = "SELECT chave.sala, aluno.nome as nomea, professor.nome as nomep, aula.datainicio, aula.datafim FROM chave "
                        . "INNER JOIN aula ON(aula.idchave=chave.id) "
                        . "INNER JOIN aluno ON(aula.idaluno=aluno.id)"
                        . "INNER JOIN professor ON(aula.idprofessor=professor.id) "
                        . "WHERE aula.status='encerrada' AND aula.idchave=$id";
                $resultado = $this->conn->query($sql12);
                echo "<br><br>PROFESSORES E ALUNOS QUE JÁ DEVOLVERAM ESSA CHAVE:<BR><br>";
                foreach($resultado as $r){
                    echo "Chave: " .$r['sala'];
                    echo ", Aluno: " .$r['nomea'];
                    echo ", Professor: " .$r['nomep'];
                    echo ", Data de aquisição: " .$r['datainicio'];
                    echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
                }
            } 
            
            else {
                $sql1 = "SELECT chave.sala, aluno.nome, aula.datainicio, aula.datafim FROM chave "
                        . "INNER JOIN aula ON(aula.idchave=chave.id) "
                        . "INNER JOIN aluno ON(aula.idaluno=aluno.id) "
                        . "WHERE aula.status='encerrada' "
                        . "AND aula.idprofessor IS null";            
            $resultado = $this->conn->query($sql1);
                echo "<br><br>CHAVES JÁ DEVOLVIDAS POR ALUNOS:<BR><br>";
                foreach($resultado as $r){
                    echo "Chave: " .$r['sala'];
                    echo ", Aluno: " .$r['nome'];
                    echo ", Data de aquisição: " .$r['datainicio'];
                    echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
                    }
            
                $sql2 = "SELECT chave.sala, professor.nome, aula.datainicio, aula.datafim FROM chave "
                        . "INNER JOIN aula ON(aula.idchave=chave.id) "
                        . "INNER JOIN professor ON(aula.idprofessor=professor.id) "
                        . "WHERE aula.status='encerrada' "
                        . "AND aula.idaluno IS null ";            
            $resultado = $this->conn->query($sql2);
                echo "<br><br>CHAVES JÁ DEVOLVIDAS POR PROFESSORES:<BR><br>";
                foreach($resultado as $r){
                    echo "Chave: " .$r['sala'];
                    echo ", Professor: " .$r['nome'];
                    echo ", Data de aquisição: " .$r['datainicio'];
                    echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
                    } 
                    
                    
                $sql3 = "SELECT chave.sala, professor.nome as nop, aluno.nome as nomea, aula.datainicio, aula.datafim FROM chave "
                        . "INNER JOIN aula ON(aula.idchave=chave.id) "
                        . "INNER JOIN professor ON(aula.idprofessor=professor.id) "
                        . "INNER JOIN aluno ON(aula.idaluno=aluno.id) "
                        . "WHERE aula.status='encerrada'";            
            $resultado = $this->conn->query($sql3);
                echo "<br><br>CHAVES JÁ DEVOLVIDAS POR PROFESSORES E ALUNOS:<BR><br>";
                foreach($resultado as $r){
                    echo "Chave: " .$r['sala'];
                    echo ", Professor: " .$r['nop'];
                    echo ", Aluno: " .$r['nomea'];
                    echo ", Data de aquisição: " .$r['datainicio'];
                    echo ", Data de devolução: " .$r['datafim'] .'<br>'.'<br>';
                    } 
            
            }
        }
        
    }

?>

