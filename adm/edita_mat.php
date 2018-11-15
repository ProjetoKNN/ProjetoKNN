<html>
	<?php 
	include("../conexao.php");
	?>
		<head>
			<title>Editar</title>
			<meta charset="utf-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    		<link rel="stylesheet" href="../css/estilo.css" type="text/css">
				<script>
					function formatar(mascara, documento){
						var i = documento.value.length;
						var saida = mascara.substring(0,1);
						var texto = mascara.substring(i)

						if (texto.substring(0,1) != saida){
							documento.value += texto.substring(0,1);
						}

					}
				</script>
		</head>

		<?php
			$consTurma = mysqli_query($conexao,"SELECT * FROM turma");
				if(!$consTurma){
					echo "Erro ao realizar consulta. Tente outra vez.";
					exit;
				}
		?>
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
                                    <a href="buscar_prof.php" class="nav-link" name="voltar">Voltar</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
			
				<?php 
					//Recebe os dados a serem editados
					$Aluno = filter_input(INPUT_POST, 'Aluno');
					$Turma = filter_input(INPUT_POST, 'Turma');
					$datamatricula = filter_input(INPUT_POST, 'datamatricula');
					$teste = filter_input(INPUT_POST, 'teste');
				?>
				<div class="container">
				<h2 id="h1Busca">Alteração de dados</h2>
			<form action="php/salva_mat.php" method="post">
				<!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
				<input type="hidden" name="Alunoo" value="<?php echo $teste; ?>">
				Turma:
					<select name='turma' class="form-control">
						<?php
							while($turm = mysqli_fetch_assoc($consTurma))
							{
								echo "<option  value=".$turm['cod'].">".$turm['nome']."</option>";
							}
						?>                
					</select><br>
				<input type="submit" class="btn btn-danger" style="width: 100%;" value="Salvar alterações"><hr>
			</form>
		</div>
	<script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>   
		</body>
</html>