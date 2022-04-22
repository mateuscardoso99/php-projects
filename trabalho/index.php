<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Trabalho PHP</title>
    </head>
    <body>
        <script>
            function redirecionar(p){
		        location.href=p;
            }
	    </script>
        
        <div>
            <button onclick="redirecionar('gerenciaPorteiro.php')">Porteiro</button>
        </div>
        
        <div>
            <button onclick="redirecionar('gerenciaProfessor.php')">Professores</button>
        </div>
        
        <div>
            <button onclick="redirecionar('gerenciaAluno.php')">Alunos</button>
        </div>
        
        <div>
            <button onclick="redirecionar('gerenciaChaves.php')">Chaves</button>
        </div>

        <div>
            <button onclick="redirecionar('verAulas.php')">Aulas</button>
        </div>
        
        <div>
            <button onclick="redirecionar('visualizarInfo.php')">Visualizar Informações</button>
        </div>
    </body>
</html>
