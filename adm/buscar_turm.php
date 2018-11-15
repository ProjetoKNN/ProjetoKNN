<!DOCTYPE html>
<html>
	<head>
		<title>Busca de Turmas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	</head>
	<body class="BuscarAL">
		<?php 
	        //Área de notificações

	        //Se existe a variável remocao, então
			if( isset($_GET['remocao'])){
		            //Se remoção tem true, os dados foram removidos
				if( $_GET['remocao'] == "true" ){
					echo "<p>Os dados foram removidos.</p>";            
				}else{
					echo "<p>Não foi possivel remover os dados.</p>";
				}
			} 
	        //Se existe a variável alteração, então
			if( isset($_GET['alteracao']) ){
		            //Se alteracao tem true, os dados foram alterados
				if( $_GET['alteracao'] == "true" ){
					echo "<p>Os dados foram alterados.</p>";            
				}else{
					echo "<p>Não foi possivel alterar os dados.</p>";
				}
			} 
		?>
		<nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
                    <div class="container">
                        <a class="navbar-brand" id="bv">Bem-vindo, Administrador</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSite">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                                        Controles
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="buscar_al.php">Controle de alunos</a>
                                        <a class="dropdown-item" href="buscar_prof.php">Controle de professores</a>
                                        <a class="dropdown-item" href="buscar_turm.php">Controle de turmas</a>
                                        <a class="dropdown-item" href="buscar_curso.php">Controle de cursos</a>
                                        <a class="dropdown-item" href="buscar_mat.php">Controle de matrículas</a>
                                    </div>
                                </li>
                            </ul>   
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="adm_func.php" class="nav-link" name="voltar">Voltar</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
		<div class="container" id="divBusca">	
			<h3 id="h1Busca">Buscar turma</h3>
		<form name="turma" method="POST">
			<caption>Buscar:</caption>
			<input type="text" name="busca" placeholder="Informe o termo de busca">
			<input type="submit" name="buscar" class="btn btn-danger" value="BUSCAR">
			<a href="inserir_turm.php" id="addAL"><button class="btn btn-danger" type="button">Inserir uma nova turma</button></a>
		</form><br><br>
			<h2>Resultado da busca:</h2>
		<div class="table-responsive table-striped">
                <table class="table table-sm">
                    <thead class='bg-danger' style="color: white;">
                        <tr>
                        	<th>Nome</th>
                        	<th>Nome do Professor</th>
                        	<th>Quantidade de alunos</th>
                        	<th>Cursos</th>
                        	<th>Editar</th>
                        	<th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
		<?php 
		    //Estabelece a conexao com o mysql
			include("../conexao.php");
			if(!$conexao){
				echo "Ops.. Erro na conexão.";
				exit;
			}
	        //Carrega os dados
			if(isset($_POST['buscar']))
			{
				$teste = $_POST['busca'];

				$consulta = mysqli_query($conexao,"SELECT curso.nome as NomeCurso, curso.cod as codigo, turma.nome as NomeTurma, turma.cod as cod, turma.qtd as qtd, professor.nome as NomeProf FROM turma inner join curso on curso.cod = turma.curso_cod join professor on professor.cod = turma.codProf where turma.nome LIKE '%$teste%'");

				
				while($dados = mysqli_fetch_assoc($consulta))
				{	echo "<tr>";
		            //echo "<td>".$dados['cod']. "</td>";
					echo "<td>".$dados['NomeTurma']."</td>";
					echo "<td>".$dados['NomeProf']. "</td>";
					echo "<td>".$dados['qtd']."</td>";
					echo "<td>".$dados['NomeCurso']."</td>";
		            // Cria um formulário para enviar os dados para a página de edição 
		            // Colocamos os dados dentro input hidden
					echo "<td>";
					echo "<form action='edita_turm.php' method='post'>";
					echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
					echo "<input name='nome' type='hidden' value='" .$dados['NomeTurma']. "'>";
					echo "<input name='codProf' type='hidden' value='" .$dados['NomeProf']. "'>";   
					echo "<input name='qtd' type='hidden' value=".$dados['qtd'].">";
					echo "<input name='curso_cod' type='hidden' value=".$dados['NomeCurso'].">";
					echo "<button class='btn btn-warning' style='color: white;'>Editar</button>";
					echo "</form>";
					echo "</td>";

		            // Cria um formulário para remover os dados 
		            // Colocamos o id dos dados a serem removidos dentro do input hidden
					echo "<td>";
					echo "<form action='remove_turma.php' method='post'>";
					echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
					echo "<button class='btn btn-danger'>Remover</button>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			}
		?>
					</tbody>
				</table>
		</div>
	</div>
		<script src="../jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.js"></script>
        <script src="../js/bootstrap.js"></script>
	</body>
</html>