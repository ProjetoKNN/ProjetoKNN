<?php
	include("conexao.php");
	//Pega o usuário e a senha da página "index" para fazer a verificação com o BD.
	$usuario = $_POST['login_nome'];
	$senha = $_POST['login_senha'];

	if($conexao){
		//Monta a consulta no banco através de string.
		$select = "SELECT * FROM login WHERE usuario LIKE '$usuario' AND senha LIKE '$senha'";
		//Executa a consulta no banco de dados.
		$consulta = mysqli_query($conexao, $select);
		//Verifica o número de registros encontrados no BD.
		$qtd_reg = mysqli_num_rows($consulta);
		
		if($qtd_reg){
			$res_consulta = mysqli_fetch_assoc($consulta);
			//Compara o usuário e senha digitado na index com os que contém no BD.
			session_start();
			$_SESSION['privilegio'] = $res_consulta['privilegio'];
			$_SESSION['usuario'] = $res_consulta['usuario'];
			header("location:login.php");
		}
		else{
			//Caso nenhum registro seja encontrado, irá informa-lo que nenhum usuário foi encontrado no Banco de dados.
			header("location:index.php?status=0");
		}
	}else
		{
			die($conexao);
			echo "Não foi possível se conectar.";
		}
?>