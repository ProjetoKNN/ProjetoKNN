<!DOCTYPE html>
<html>
	<head>
		<title>Inserção de Professores</title>
		<meta charset="UTf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	</head>
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
	<body class="BuscarAL">
		<nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
			<div class="container">
				<a class="navbar-brand" ><img src="../img/testelogo.jpg" class="d-inline-block align-top"></a>
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
							<a href="buscar_prof.php" class="nav-link" name="sair">Voltar</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			<h3 id="h1Busca">Inserindo Professor:</h3>
			<form name="aluno" action="" method="POST">
				Nome:
				<input type="text" name="nome" placeholder="Insira o nome completo" class="form-control" required="true" id="nome"><br>
				CPF:
				<input type="text" name="cpf" placeholder="Insira um CPF válido" class="form-control" maxlength="14" required="true" OnKeyPress="formatar('###.###.###-##', this)" id="cpf"><br>
				RG:
				<input type="text" name="rg" placeholder="Insira um RG válido" class="form-control" maxlength="10" required="true" OnKeyPress="formatar('##.###.###', this)" id="rg"> <br>
				Telefone:
				<input type="text" name="tel" maxlength="13" class="form-control" placeholder="xx-xxxxx-xxxx" required="true" OnKeyPress="formatar('##-#####-####', this)" id="tel"><br>
				Rua:
				<input type="text" name="rua" class="form-control"  placeholder="Insira a rua" required="true" id="rua"><br>
				Número:
				<input type="text" name="num" class="form-control" placeholder="xxxx" id="nmr"><br>
				Bairro:
				<input type="text" name="bairro" class="form-control" placeholder="Insira o bairro" required="true" id="bairro"><br>
				Cidade:
				<input type="text" name="city" class="form-control" placeholder="Insira a cidade" required="true" id="city"><br>
				UF:
				<input type="text" name="uf" class="form-control" maxlength="2" placeholder="UF" required="true" id="uf"> <br>
				E-mail:
				<input type="text" name="email" class="form-control" placeholder="Insira o e-mail" id="email"><br>
				<hr>
				<h3 id="p">Informações do Login:</h3><br>
				Nome de usuário:
				<input type="text" name="login" class="form-control" placeholder="Insira o nome de usuário desejado"><br>
				Senha:
				<input type="password" name="senha" class="form-control" maxlength="16" placeholder="Insira a senha desejado"><br>
				<input type="submit" name="inserir" class="btn btn-danger" style="width: 100%;" value="INSERIR"><br><br>
				<input type="reset" name="limpar" class="btn btn-danger" style="width: 100%;" value="LIMPAR"><br>
				<?php
	include("../conexao.php");
	if(isset($_POST['inserir'])){
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$telefone = $_POST['tel'];
		$rua = $_POST['rua'];
		$numero = $_POST['num'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['city'];
		$uf = $_POST['uf'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];
		$priv = "prf";

		$query = mysqli_query($conexao,"INSERT INTO professor(nome, cpf, rg, rua, email, telefone, numero, bairro, cidade, estado) VALUES ('$nome','$cpf', '$rg', '$rua', '$email', '$telefone', '$numero', '$bairro', '$cidade', '$uf')");
		$nao = mysqli_query($conexao,"INSERT INTO login(usuario, senha, privilegio, pr) VALUES ('$login', '$senha', '$priv', '$cpf')");
		if(!$query && !$nao){
			echo "<br><div class='alert alert-danger' role='alert'>
		  					Erro ao cadastrar o professor! Tente novamente!
					</div>";
		}else{
			echo "<br><div class='alert alert-success' role='alert'>
		  						Professor cadastrado com sucesso!
					</div>";
		}
	}
?>
			</form><hr>
		</div>
		<script src="../jquery/dist/jquery.js"></script>
    	<script src="popper.js/dist/popper.js"></script>
    	<script src="../js/bootstrap.js"></script>
	</body>
</html>
