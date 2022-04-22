<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="processa.php" method="post">
            <h1>CADASTRAR ALUNOS</h1>
            <div>
                <label>NOME:</label>
                <input type="text" name="nomealuno" required>
            </div>
            
            <div>
                <label>CURSO:</label>
                <input type="text" name="curso" required>
            </div>
            
            <div>
                <label>PROFESSOR RESPONSÁVEL:</label>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("professor","ativado");
                ?>
	
        		<select name="comboboxProfessorResp">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
            
            <div>
                <button>CADASTRAR ALUNO</button>
            </div>
        </form>
        
        <hr>
        
        <form action="processa.php" method="post">
            <h1>ATUALIZAR ALUNO</h1>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("aluno",null);
                ?>
	
        		<select name="comboboxAtualizarAluno">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
            
            <h3>O QUE DESEJA ALTERAR</h3>
            <select name="opcoesAluno">
                <option>Nome</option>
                <option>Curso</option>
            </select>
                
            <div>
                <label>DADO NOVO:</label>
                <input type="text" name="dadonovo" required>
            </div>
            
            <div>
                <button>ATUALIZAR</button>
            </div>
        </form>
        
        <hr>
        
        <form action="processa.php" method="post">
            <h1>APAGAR ALUNO</h1>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			//$sql = "SELECT * FROM aluno";				
        			//$resultado = $banco->conn->query($sql);
                    $resultado = $banco->read("aluno",null);
                ?>
        		<select name="comboboxExcluirAluno">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>        
                
            <div>
                <button>APAGAR</button>
            </div>
        </form>
        
        <hr>        
        
        <form action="processa.php" method="post">
            <h3>DESATIVAR ALUNO</h3>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("aluno","ativado");
                ?>
	
        		<select name="comboboxDesativarAluno">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
                
            <div>
                <button>DESATIVAR CADASTRO</button>
            </div>
        </form>
        
        <hr>
        
        <form action="processa.php" method="post">
            <h3>ATIVAR ALUNO</h3>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("aluno","desativado");
                ?>
	
        		<select name="comboboxAtivarAluno">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
                
            <div>
                <button>ATIVAR CADASTRO</button>
            </div>
        </form>
        
        
        <script>
            function redirecionar(){
                location.href="index.php";
            }
	   </script>
        
        <br>
        <hr>
        <br>
        
        <div>
            <button onclick="redirecionar()">Voltar</button>
        </div>
        
    </body>
</html>

