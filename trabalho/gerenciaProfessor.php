<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <form action="processa.php" method="post">
            <h1>CADASTRAR PROFESSORES</h1>
                <div>
                    <label>NOME:</label>
                    <input type="text" name="nomeprofessor" required>
                </div>
            
                <div>
                   <label>GRADUAÇÃO:</label>
                    <input type="text" name="graduacao" required>
                </div>
            
                <div>
                    <button>CADASTRAR PROFESSOR</button>
                </div>
        </form>
        
        <hr>
        
        <form action="processa.php" method="post">
            <h1>ATUALIZAR PROFESSOR</h1>
            <div>
                <?php 
            		include_once "banco.php";
            		$banco = new Database();
            		$resultado = $banco->read("professor",null);
                ?>
	
            	<select name="comboboxAtualizarProfessor">
            		<?php	foreach($resultado as $r){ ?>
            				<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
            		<?php	} ?>
            	</select>
            </div>
            
            <h3>O QUE DESEJA ALTERAR</h3>
            <select name="opcoesProfessor">
                <option>Nome</option>
                <option>Graduação</option>
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
            <h1>APAGAR PROFESSOR</h1>
            <div>
                <?php 
                    include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("professor",null);
                ?>
	
        		<select name="comboboxExcluirProfessor">
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
            <h3>DESATIVAR PROFESSOR</h3>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("professor","ativado");
                ?>
	
        		<select name="comboboxDesativarProfessor">
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
            <h3>ATIVAR PROFESSOR</h3>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("professor","desativado");
                    ?>
	
            	<select name="comboboxAtivarProfessor">
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

