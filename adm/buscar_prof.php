<!DOCTYPE html>
<html>
	<head>
		<title>Busca de Professores</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	</head>
	<body class="BuscarAL">

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
				<h3 id="h1Busca">Buscar professor</h1>
			<form name="professor" method="POST">
				<caption id="nha">Buscar:</caption>
				<input type="text" name="busca" id="b" placeholder="Informe a busca">
				<input type="submit" name="buscar" class="btn btn-danger" value="BUSCAR">
				<a href="inserir_prof.php" id="addAL"><button class="btn btn-danger" type="button">Inserir um novo professor</button></a>
			</form><br><br>
				<h2>Resultado da busca:</h2>
				<div class="table-responsive table-striped">
                    <table class="table table-sm">
                        <thead class='bg-danger' style="color: white;">
                        	<tr>
                        		<th>Nome</th>
                        		<th>CPF</th>
                        		<th>RG</th>
                        		<th>E-mail</th>
                        		<th>Telefone</th>
                        		<th>Endereço</th>
                        		<th>Bairro</th>
                        		<th>Cidade</th>
                        		<th>Estado</th>
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
					if(isset($_POST['buscar'])){
						$teste = $_POST['busca'];
						$sql = "SELECT * FROM professor WHERE nome LIKE '%$teste%'";
						$consulta = mysqli_query($conexao, $sql);
							if(!$consulta){
								echo "Erro ao realizar consulta. Tente outra vez.";
								exit;
							}
				            //se tudo deu certo, exibe os dados
							while( $dados = mysqli_fetch_assoc($consulta) ){
					            //echo "<td>" .$dados['cod']. "</td>";
					            echo "<tr>";
								echo "<td>" .$dados['nome']. "</a></td>";
								echo "<td>" .$dados['cpf']. "</td>";
								echo "<td>" .$dados['rg']. "</td>";
								echo "<td>" .$dados['email']. "</td>";
								echo "<td>" .$dados['telefone']. "</td>";
								echo "<td>" .$dados['rua'].", ".$dados['numero']. "</td>";
								echo "<td>" .$dados['bairro']. "</td>";
								echo "<td>" .$dados['cidade']. "</td>";
								echo "<td>" .$dados['estado']. "</td>";

					            // Cria um formulário para enviar os dados para a página de edição 
					            // Colocamos os dados dentro input hidden
								echo "<td>";
								echo "<form action='edita_prof.php' method='post'>";
								echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
								echo "<input name='nome' type='hidden' value='" .$dados['nome']. "'>";
								echo "<input name='cpf' type='hidden' value='" .$dados['cpf']. "'>";   
								echo "<input name='rg' type='hidden' value='" .$dados['rg']. "'>";
								echo "<input name='email' type='hidden' value='" .$dados['email']. "'>";
								echo "<input name='telefone' type='hidden' value='" .$dados['telefone']. "'>";
								echo "<input name='bairro' type='hidden' value='" .$dados['bairro']. "'>";
								echo "<input name='cidade' type='hidden' value='" .$dados['cidade']. "'>";
								echo "<input name='estado' type='hidden' value='" .$dados['estado']. "'>";
								echo "<input name='rua' type='hidden' value='" .$dados['rua']. "'>"; 
								echo "<input name='nmr' type='hidden' value='" .$dados['numero']. "'>"; 
								echo "<button class='btn btn-warning' style='color: white;'>Editar</button>";
								echo "</form>";
								echo "</td>";

					            // Cria um formulário para remover os dados 
					            // Colocamos o id dos dados a serem removidos dentro do input hidden
								echo "<td>";
								echo "<form action='php/remove_prof.php' method='post'>";
								echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
								echo "<button class='btn btn-danger'>Remover</button>";
								echo "</form>";
								echo "</td>";
								echo "</tr>";
							}
					} 
	        //Área de notificações

	        //Se existe a variável remocao, então
			if( isset($_GET['remocao'])){
		        //Se remoção tem true, os dados foram removidos
				if( $_GET['remocao'] == "true" ){
					echo "<div class='alert alert-success' role='alert'>
                                    Professor removido com sucesso!
                                </div>";            
				}else{
					echo "<div class='alert alert-success' role='alert'>
                                    Erro ao remover o professor! Tente novamente!
                                </div>";
				}
			} 
	        //Se existe a variável alteração, então
			if( isset($_GET['alteracao']) ){
		            //Se alteracao tem true, os dados foram alterados
				if( $_GET['alteracao'] == "true" ){
					echo "<div class='alert alert-success' role='alert'>
                                    Alteração concluída com sucesso!
                                </div>";            
				}else{
					echo "<div class='alert alert-success' role='alert'>
                                    Erro na alteração! Tente novamente!
                                </div>";
				}
			} 
				?>
			</tbody>
		</table>
			</div>
			<script src="../jquery/dist/jquery.js"></script>
            <script src="popper.js/dist/popper.js"></script>
            <script src="../js/bootstrap.js"></script>    
	</body>
</html>