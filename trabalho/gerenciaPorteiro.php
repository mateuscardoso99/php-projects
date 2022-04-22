<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <form action="processa.php" method="post">
        <h3>CADASTRAR PORTEIRO</h3>
        <div>
            <label>NOME:</label>
            <input type="text" name="nomePorteiro" required>
        </div>
                
        <div>
            <button>CADASTRAR PORTEIRO</button>
        </div>
    </form>
        
    <hr>

    <form action="processa.php" method="post">
        <h3>ATUALIZAR PORTEIRO</h3>
        <div>
            <?php 
    			include_once "banco.php";
    			$banco = new Database();
    			$resultado = $banco->read("porteiro",null);
            ?>
	
    		<select name="comboboxAtualizarPorteiro">
    			<?php	foreach($resultado as $r){ ?>
    					<option value="<?php echo $r['id'] ?>"><?php echo $r['nome']?></option>
    			<?php	} ?>
        	
    		</select>
        </div>
                
        <div>
            <label>NOME NOVO:</label>
            <input type="text" name="nomenovo" required>
        </div>
            
        <div>
            <button>ATUALIZAR</button>
        </div>
    </form>
        
    <hr>
        
    <form action="processa.php" method="post">
        <h3>APAGAR PORTEIRO</h3>
        <div>
            <?php 
    	   		include_once "banco.php";
    			$banco = new Database();
    			$resultado = $banco->read("porteiro",null);
            ?>
	
    		<select name="comboboxExcluirPorteiro">
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
        <h3>DESATIVAR PORTEIRO</h3>
            <div>
                <?php 
        			include_once "banco.php";
        			$banco = new Database();
        			$resultado = $banco->read("porteiro","ativado");
                ?>
	
        		<select name="comboboxDesativarPorteiro">
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
            <h3>ATIVAR PORTEIRO</h3>
            <div>
                <?php 
            		include_once "banco.php";
            		$banco = new Database();
            		$resultado = $banco->read("porteiro","desativado");
                ?>
	
            	<select name="comboboxAtivarPorteiro">
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

