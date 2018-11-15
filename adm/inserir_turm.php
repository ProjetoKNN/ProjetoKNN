<!DOCTYPE html>
	<?php
	include("../conexao.php");
	?>
<html>
	<head>
		<title>Inserção de Cursos & Turmas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	</head>
	<body class="BuscarAL">
		<?php 
			$consCurs = mysqli_query($conexao,"SELECT * FROM curso");
			$consProf = mysqli_query($conexao,"SELECT * FROM professor");
			if( !$consProf ){
				echo "Erro ao realizar consulta. Tente outra vez.";
				exit;
			}
			if(!$consCurs){
				echo "Erro ao realizar consulta. Tente outra vez.";
				exit;
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
							<a href="buscar_turm.php" class="nav-link" name="sair">Voltar</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
		<h3 id="h1Busca">Inserção de Cursos:</h3>
		<form method="POST">
			Nome do curso:
			<input type="text" class="form-control" name="nomecurso"><br>
			<input type="submit" name="curso" class="btn btn-danger" style="width: 100%;" value="Inserir"><br>
			<?php
				if(isset($_POST['curso'])){
				$nomecurso = $_POST['nomecurso'];

				$curso = mysqli_query($conexao,"INSERT INTO curso(nome) VALUES ('$nomecurso') ");

				if(!$curso){
					echo "<br><div class='alert alert-danger' role='alert'>
		        				Erro ao realizar cadastro! Tente outra vez!
		        			</div>";
				}else{
					echo "<br><div class='alert alert-success' role='alert'>
		  						Cadastro realizado com sucesso!
							</div>";
					}
				}
			?>
		</form><hr>
		<h3 id="h1Busca">Inserção de Turmas:</h3>
		<form method="POST"id="cursoTurm">
			Nome da turma:
			<input type="text" name="nome" class="form-control" required="true"><br>
			Quantidade de alunos:
			<input type="text" name="qtd" class="form-control" maxlength="2" required="true"><br>
				Professor:
				<select name="codProf" class="form-control" form="cursoTurm">
					<?php
					while($prof = mysqli_fetch_assoc($consProf)){
						echo "<option value=".$prof['cod'].">".$prof['nome']."</option>";
					}
					?>
				</select><br>
			Curso:
			<select name="codCurso" class="form-control" form="cursoTurm">
				<?php
					while($curs = mysqli_fetch_assoc($consCurs)){
						echo "<option value=".$curs['cod'].">".$curs['nome']."</option>";
					}
				?>
			</select><br>
			<input type="submit" name="turma" class="btn btn-danger" style="width: 100%;" value="Inserir"><br>
			<?php
			if(isset($_POST['turma'])){
				$nome = $_POST['nome'];
				$codProf = $_POST['codProf'];
				$qtd = $_POST['qtd'];
				$curso_cod = $_POST['codCurso'];
				$turma = mysqli_query($conexao,"INSERT INTO turma (nome, codProf, qtd, curso_cod) VALUES ('$nome', '$codProf', '$qtd', '$curso_cod')");
				if( !$turma ){
					echo "<br><div class='alert alert-danger' role='alert'>
		        				Erro ao realizar cadastro! Tente outra vez!
		        			</div>";
				}else{
					echo "<br><div class='alert alert-success' role='alert'>
		  						Cadastro realizado com sucesso!
							</div>";
				}
			}
			?>
		</form><hr>
	</div>
	</body>
</html>