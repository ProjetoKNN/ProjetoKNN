<!DOCTYPE html>
<html>
<head>
	<title>Painel do Admnistrador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
</head>
	
<body class="admFunc">
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
							<a class="dropdown-item" href="pagamentos.php">Controle de mensalidades</a>
						</div>
					</li>
				</ul>	
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="../login_logout.php" class="nav-link" name="sair">Sair</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" id="divprincipal" >	
		<div>
			<div>
				<a href="buscar_al.php"><button class="b" type="button">Controle de alunos</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_prof.php"><button class="b" type="button">Controle de professores</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_turm.php"><button class="b" type="button"">Controle de turmas</button></a>
				
				<hr>
			</div>
			<div>
				<a href="buscar_curso.php"><button class="b" type="button"">Controle de cursos</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_mat.php"><button class="b" type="button">Controle de matrículas</button></a>
				<hr>
			</div>
			<div>
				<a href="pagamentos.php"><button class="b" type="button">Controle de mensalidades</button></a>
			</div>
		</div>
	</div>
	<script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>