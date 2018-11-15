<!DOCTYPE html>
<html>
<head>
	<title>Boletim</title>
	<meta charset="UTf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">

</head>
<body>
	<?php
		include("../conexao.php");
		// session_start();
		//Pega o cod do aluno da INDEX através de um SESSION.
		$CodAluno = $_SESSION['CodAluno'];

		$sql = "SELECT * FROM boletim where aluno_cod = $CodAluno";

		$consulta = mysqli_query($conexao, $sql);
			if(!$consulta)
			{
	            echo "Erro ao realizar consulta. Tente outra vez.";
	           	exit;
	        }
	        while($dados = mysqli_fetch_assoc($consulta))
	        {
	        	echo "<div class='table-responsive table-striped'>";
	        	echo "<h2>Boletim</h2>";
	        	echo "<table class='table table-sm'>";
	        	echo "<thead class='bg-danger' style='color: white;'>";
	        	echo "<tr>";
	        	//Utiliza de um for para rodar as notas contidas no banco de dados do aluno.
	        	for($i = 1; $i <= 6; $i++){
	        		//Utiliza de um if para checar se essa nota existe no BD, caso não exista, não irá mostrar nada, apenas as existentes.
	        		if($dados['nota'.$i] != ""){
	        			echo "<th>Nota".$i."</th>";
	        			// echo "Nota".$i.": ".$dados['nota'.$i]."<br>";

	        		}
	        	}
	        	echo "<th>Média</th>";
	        	echo "<th>Faltas</th>";
	        	echo "<th>Reposições</th>";
	        	echo "</tr>";
	        	echo "</thead>";
	        	echo "<tbody>";
	        	echo "<tr>";
	        	for($i = 1; $i <= 6; $i++){
	        		//Utiliza de um if para checar se essa nota existe no BD, caso não exista, não irá mostrar nada, apenas as existentes.
	        		if($dados['nota'.$i] != ""){
	        			// echo "<th>Nota".$i."</th>";
	        			echo "<td>".$dados['nota'.$i]."</td>";

	        		}
	        	}
	        	echo "<td>".$dados['media']."</td>";
	        	echo "<td>".$dados['falta']."</td>";
	        	echo "<td>".$dados['reposicao']."</td>";
	        	echo "</tr>";
	        	echo "</tbody>";
	        	echo "</table>";
	        	echo "</div>";
	        }	
	?>
</body>
</html>