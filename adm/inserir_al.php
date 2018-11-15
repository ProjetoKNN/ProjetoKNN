	<?php
	include("../conexao.php");
	date_default_timezone_set('America/Sao_Paulo');
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inserção de Alunos</title>
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
							<a href="buscar_al.php" class="nav-link" name="sair">Voltar</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="container" id="divInserir">
			<h3 id="h1Busca">Inserir aluno:</h3>
		<form name="aluno" action="" method="POST">
			Nome:
			<input type="text" name="nome" class="form-control" placeholder="Insira o nome completo" required id="nome"><br>
			Data de nascimento:
			<input type="date" name="data" class="form-control" required><br>
			CPF:
			<input type="text" id="cpf" name="cpf" class="form-control" placeholder="Insira um CPF válido" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required><br>
			RG:
			<input type="text" name="rg" placeholder="Insira um RG válido" class="form-control" id="rg" maxlength="10" OnKeyPress="formatar('##.###.###', this)" required><br>
			Telefone:
			<input type="text" name="tel" maxlength="13" placeholder="xx-xxxxx-xxxx" class="form-control" id="tel" OnKeyPress="formatar('##-#####-####', this)" required><br>
			Nome do responável:
			<input type="text"  name="nomeResp" id="resp" class="form-control" placeholder="Insira o nome do responável"><br>
			Telefone do responsável:
			<input type="text" name="telResp" maxlength="13" id="tel" class="form-control" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)"><br>
			Rua:
			<input type="text" name="rua" placeholder="Informe a rua" class="form-control" id="rua" required><br>
			Numero:	
			<input type="text" placeholder="  xxxx" name="nmr" class="form-control"  id="nmr"><br>
			Bairro:	
			<input type="text" name="bairro" placeholder="Insira o bairro" class="form-control" id="bairro" required><br>
			Cidade:
			<input type="text" name="cidade" placeholder="Informe a cidade" class="form-control"  id="city" required><br>
			UF:
			<input type="text" name="estado" maxlength="2" id="uf" class="form-control" required><br>
			CEP:
			<input type="text" name="cep" maxlength="9" placeholder="Informe o CEP" class="form-control" id="cep" OnKeyPress="formatar('#####-###', this)" required><br>
			E-mail:
			<input type="text" name="email" placeholder="Informe o e-mail" class="form-control" ><br>
			Alergia alimentar:
			<input type="text" name="alergiaalimentar" placeholder="Informe as doenças" class="form-control"  id="aliment"><br>
			Remédio:
			<input type="text" name="remedio" placeholder="Informe os remédios" class="form-control" id="remedio"><br>
			Alergia:
			<input type="text" name="alergia" placeholder="Informe as alergias" class="form-control" id="alergia"><br>
			<hr>
			<h3>Informações do Login:</b></h3><br>
			Nome de usuário:
			<input type="text" name="login" class="form-control" placeholder="Insira o nome de usuário"><br>
			Senha:
			<input type="password" name="senha" class="form-control" maxlength="16" placeholder="Insira a senha"> <br>
			<input type="submit" name="inserir" class="btn btn-danger" style="width: 100%;" value="INSERIR"><br><br>
			<input type="reset" name="limpar" class="btn btn-danger" style="width: 100%" value="LIMPAR"><br>
			<?php
	//inserindo os dados de alunos.
	if(isset($_POST['inserir'])){
		$nome = $_POST['nome'];
		$datanasc = $_POST['data'];
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$contato = $_POST['tel'];
		$nomeresp = $_POST['nomeResp'];
		$contatoresp = $_POST['telResp'];
		$rua = $_POST['rua'];
		$nmr = $_POST['nmr'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$priv = "usr";
		$bairro = $_POST['bairro'];
		$uf = $_POST['estado'];
		$cep = $_POST['cep'];
		$email = $_POST['email'];
		$alergiaalimentar = $_POST['alergiaalimentar'];
		$remedio = $_POST['remedio'];
		$alergia = $_POST['alergia'];
		$cidade = $_POST['cidade'];

		$aluno = mysqli_query($conexao,"INSERT INTO aluno(nome, cpf, rg, datanascimento, telefonealuno, nomeresponsavel, telefoneresponsavel, rua, numero, bairro, cidade, estado, cep, email, alergiaalimentar, remedio, alergia) VALUES ('$nome','$cpf', '$rg', '$datanasc', '$contato', '$nomeresp', '$contatoresp', '$rua', '$nmr', '$bairro', '$cidade', '$uf', '$cep', '$email','$alergiaalimentar','$remedio','$alergia')");
		$login = mysqli_query($conexao,"INSERT INTO login(usuario, senha, privilegio, al) VALUES ('$login', '$senha', '$priv', '$cpf')");
		if(!$aluno && !$login){
			echo "<br><div class='alert alert-danger' role='alert'>
		  					Erro ao cadastrar o aluno! Tente novamente!
					</div>";
		}else{
			echo "<br><div class='alert alert-success' role='alert'>
		  						Aluno cadastrado com sucesso!
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
