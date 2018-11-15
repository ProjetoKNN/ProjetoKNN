<?php
	include("../conexao.php");
	date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inserção de Matrículas</title>
		<meta charset="UTf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	</head>
	<?php
		$consAl = mysqli_query($conexao,"SELECT * FROM aluno");
		$consTurm = mysqli_query($conexao,"SELECT * FROM turma");

		if(!$consAl){
	        echo "Erro ao realizar consulta. Tente outra vez.";
	        exit;
	    }
	    if(!$consTurm){
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
								<a class="dropdown-item" href="buscar_al.php">Controle de Alunos</a>
								<a class="dropdown-item" href="buscar_prof.php">Controle de Professores</a>
								<a class="dropdown-item" href="#">Controle de Turmas</a>
								<a class="dropdown-item" href="#">Controle de Cursos</a>
								<a class="dropdown-item" href="#">Controle de Matrículas</a>
							</div>
						</li>
					</ul>	
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a href="buscar_mat.php" class="nav-link" name="sair">Voltar</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<h3 id="h1Busca">Matriculando um aluno:</h3>
		<form method="POST">
			Data Matrícula:
			<input type='text' class="form-control" value='<?php echo date("d/m/Y"); ?>' readonly="true"><br>
				Aluno:
				<select class="form-control" name="alunin">
					<?php
						while($alun = mysqli_fetch_assoc($consAl)){
						echo "<option value=".$alun['cod'].">".$alun['nome']."</option>";
					}
					?>
				</select><br>
				Turma:
				<select class="form-control" name="turmin">
					<?php
						while($turm = mysqli_fetch_assoc($consTurm))
						{
							echo "<option value=".$turm['cod'].">".$turm['nome']."</option>";
						}
					?>
				</select><br>
			<input type="submit" class="btn btn-danger" name="inserir_mat" style="width: 100%;" value="INSERIR">
		</form>
	</body>
</html>
<?php
	if(isset($_POST['inserir_mat'])){
		$dataMat = date("Y/m/d");
    	str_replace('/','-',$dataMat);
    	$aluno = $_POST['alunin'];
    	$turma = $_POST['turmin'];

    	$mat = mysqli_query($conexao,"INSERT INTO matricula(datamatricula, aluno_cod, turma_cod) VALUES ('$dataMat','$aluno','$turma')");
    	if(!$mat){
        	echo "<br><div class='alert alert-danger' role='alert'>
        				Erro ao realizar cadastro! Tente outra vez!
        			</div>";
        	exit;
        }else{
        	echo "<br><div class='alert alert-success' role='alert'>
  						Cadastro realizado com sucesso!
					</div>";
        }

	}
?>