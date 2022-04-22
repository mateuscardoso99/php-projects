<?php
    include_once 'banco.php';
    $banco = new Database();
    
    echo "CHAVES CADASTRADAS:<br>";
    $resultado=$banco->read("chave", null);
    foreach($resultado as $r){
        echo "Chave: " .$r['sala'];
        echo " Situação: " .$r['situacao'].'<br>';
    }
    
    echo "<br>CHAVES DISPONÍVEIS:<br>";
    $resultado=$banco->read("chave", "liberada");
    foreach($resultado as $r){
        echo "Chave: " .$r['sala'];
        echo " Situação: " .$r['situacao'].'<br>';
    }
    
    $banco->ChavesOcupadas();
    $banco->__destruct();
    echo"<br>";
?>

<html>
    <body>
        <div>
            <button onclick="location.href='todasAsChavesDevolvidas.php'">Visualizar relatório de todas as chaves devolvidas</button>
        </div>
        
        <hr>
        
        <form action="chavesDevolvidas.php" method="get">
            <div>          
                <?php 
            		include_once "banco.php";
            		$banco = new Database();
            		$resultado = $banco->read("chave",null);
                ?>	
                <select name="comboboxChavesDevolvidas">
                    <?php	foreach($resultado as $r){ ?>
                                <option value="<?php echo $r['id'] ?>"><?php echo $r['sala']?></option>
                    <?php	} ?>
                </select>
            </div>
            <div>
                <button>Visualizar relatório de chaves devolvidas</button>
            </div>
        </form>        
        <hr>        
        <form action="chavesDevolvidas.php" method="get">
            <div>
                <label>ALUNOS:</label>
                 <?php 
        			include_once "banco.php";
        			$banco = new Database();
                    $alunos = $banco->read("aluno", null);
                ?>
	
        		<select name="comboboxAlunos">                  
        			<?php	foreach($alunos as $r){ ?>
        					   <option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        		</select>
            </div>
            
            <div>
                <button>Relatório de chaves por Aluno</button>
            </div>
        </form>
        
        <hr>
        
        <form action="chavesDevolvidas.php" method="get">
            <div>
                <label>PROFESSORES:</label>
                 <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$professores = $banco->read("professor",null);
                ?>
	
        		<select name="comboboxProfessores">                  
        			<?php	foreach($professores as $r){ ?>
        					   <option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        		</select>
            </div>
            
            <div>
                <button>Relatório de chaves por Professor</button>
            </div>
        </form>
        
        <?php
            $banco->__destruct();
        ?>
        
        <hr>
        <!--/////////////////////////////////////////////////////////////////////////-->
        <div>
            <button onclick="location.href='index.php'">Voltar</button>
        </div>
    </body>
</html>
