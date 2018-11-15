<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<!-- Bootstrap CSS -->
</head>
<script>
	function myFunction() {
		var x = document.getElementById("txtsenha");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
			}
		}
		</script>
<body class="login">
	<!-- required: Obriga o usuário a preencher algum campo.-->
		<h1 id="Login">Login</h1>
		<div class="w3ls-login box box--big" id="LoginFormulario">
			<form name="login_sys" action="verificar.php" method="post">
				<div class="agile-field-txt">
					<label for="txtnome">
						<i class="fa fa-user" aria-hidden="true"></i>Nome:
					</label><br>
					<input type="text" name="login_nome" required="true" id="txtnome"><br><br>
				</div>
				<label for="txtsenha">
					<i class="fa fa-envelope" aria-hidden="true"></i>Senha: 
				</label><br>
				<input type="password" name="login_senha" required="true" id="txtsenha">
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Mostrar Senha</label>
				</div><br><br>
				<div class="w3ls-bot">
					<div class="form-end">
						<input type="submit" value="LOGIN">
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
			<div class="copy-wthree">
				<p>© 2018 Portal KNN. Direitos reservados | Design by IM3A</p>
			</div>
		</div>
	<?php
			if(isset($_GET['status']))
			{
				if(intval($_GET['status']) == 0){
				 echo "<script>alert('Usuário ou senha inválidos')</script>";	
				}

				if(intval($_GET['status']) == 1){
					echo "<script>alert('Você não tem permissão para acessar essa página.')</script>";
				}
				if(intval($_GET['status']) == 2){
					echo "<script>alert('Você precisa fazer para continuar.')</script>";
				}
			}	
		?>
	<script src="jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="js/bootstrap.js"></script>	
</body>
</html>