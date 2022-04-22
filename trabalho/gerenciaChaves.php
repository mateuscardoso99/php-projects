<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <form action="processa.php" method="post">
            <h1>CADASTRAR CHAVE</h1>
            <div>
                <label>SALA:</label>
                <input type="text" name="sala" required>
            </div>
            
            <div>
                <label>PORTEIRO:</label>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("porteiro",null);
                ?>
	
        		<select name="comboboxChavePorteiro">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
            
            <div>
                <button>CADASTRAR CHAVE</button>
            </div>
        </form>
        
        <hr>
        
        <form action="processa.php" method="post">
            <h1>ATUALIZAR CHAVE</h1>
            <div>
                <?php 
            		include_once "banco.php";
            		$banco = new Database();
            		$resultado = $banco->read("chave",null);
                ?>
    	
        		<select name="comboboxAtualizarChave">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['sala']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
                
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
            <h1>APAGAR CHAVE</h1>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("chave",null);
                ?>
	
        		<select name="comboboxExcluirChave">
        			<?php	foreach($resultado as $r){ ?>
        					<option value="<?php echo $r['id'] ?>"><?php echo $r['sala']?></option>
        			<?php	} ?>
        	
        		</select>
            </div>
                
            <div>
                <button>APAGAR</button>
            </div>
        </form> 
        
        <br>
        <hr>
        <br>
        
        <fieldset>
            <legend>LIBERAR CHAVE</legend>
            
            <form action="processa.php" method="post">
                <div>
                    <label>CHAVE:</label>
                    <?php 
            			include_once "banco.php";
            			$banco = new Database();
            			$resultado = $banco->read("chave","liberada");
                    ?>
	
            		<select name="comboboxLiberarChave">
            			<?php	foreach($resultado as $r){ ?>
            					<option value="<?php echo $r['id'] ?>"><?php echo $r['sala']?></option>
            			<?php	} ?>
            	
            		</select>
                </div>
            
                <div>
                    <label>PROFESSOR RESPONSÁVEL:</label>
                    <?php 
            			include_once "banco.php";
            			$banco = new Database();
            			$professores = $banco->read("professor","ativado");
                    ?>
	
            		<select name="comboboxProfessorResponsavel">
                        <option>Nenhum</option> 

            			<?php	foreach($professores as $r){ ?>
            					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
            			<?php	} ?>
            		</select>
                </div>
            
                <div>
                    <label>ALUNO RESPONSÁVEL:</label>
                    <?php 
            			include_once "banco.php";
            			$banco = new Database();
                        $alunos = $banco->read("aluno","ativado");
                    ?>
	
            		<select name="comboboxAlunoResponsavel">
                                <option>Nenhum</option>
            			<?php	foreach($alunos as $r){ ?>
            					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
            			<?php	} ?>
            		</select>
                </div>
            
                <div>
                    <label>PORTEIRO:</label>
                    <?php 
            			include_once "banco.php";
            			$banco = new Database();
            			$resultado = $banco->read("porteiro","ativado");
                    ?>
	
            		<select name="comboboxChavePorteiroLiberarAula">
            			<?php	foreach($resultado as $r){ ?>
            					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
            			<?php	} ?>
            	
            		</select>
                </div>
            
                <div>
                    <label>DATA:</label>
                    <input type="date" name="dataliberacao" required>
                </div>
                
                <div>
                    <button>LIBERAR E INICIAR AULA</button>
                </div>
            </form> 
        </fieldset>
        
        <br>
        <hr>
        <br>
        
        <fieldset>
            <legend>DEVOLVER CHAVE</legend>
        
            <form action="processa.php" method="post">
                <div>
                    <label>CHAVE:</label>
                    <?php 
            			include_once "banco.php";
            			$banco = new Database();
            			$resultado = $banco->read("chave","ocupada");
                    ?>
	
            		<select name="comboboxDevolverChave">
            			<?php	foreach($resultado as $r){ ?>
            					<option value="<?php echo $r['id'] ?>"><?php echo $r['sala']?></option>
            			<?php	} ?>
            	
            		</select>
                </div>
            
                <div>
                    <label>DATA:</label>
                    <input type="date" name="dataentrega" required>
                </div>
                
                <div>
                    <button>DEVOLVER CHAVE E ENCERRAR AULA</button>
                </div>
            </form> 
        </fieldset>
        
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

