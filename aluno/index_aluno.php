<?php 
	session_start();
	include("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página do Aluno</title>
	<meta charset="UTf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body class="BuscarAL">
			<?php 	
			$user = $_SESSION['usuario'];
						
			$query = "SELECT login.al as cpf FROM login where usuario = '".$user."'";
			
			$resQuery = mysqli_query($conexao, $query);
			
			$res = mysqli_fetch_assoc($resQuery);
			$cpf = $res['cpf'];
			
			$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno, aluno.cpf as alunocpf, aluno.rua as alunorua, aluno.rg as alunorg, aluno.bairro as alunobairro, aluno.email as alunoemail FROM aluno where aluno.cpf = '".$cpf."'";

			$nhe = mysqli_query($conexao,$sql);
			$nha = mysqli_fetch_assoc($nhe);

			$array = explode(" ",$nha['NomeAluno'])
?>
	<nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
                    <div class="container">
                        <a class="navbar-brand" id="bv">Bem-vindo, <?php echo $array[0]; ?></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSite">   
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="../login_logout.php" class="nav-link" name="voltar">Sair</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
	<div class="container-fluid">
<?php	
			$consulta = mysqli_query($conexao, $sql);
				if(!$consulta){
	                echo "Erro ao realizar consulta. Tente outra vez.";
	            	exit;
	            }
	            while($dados = mysqli_fetch_assoc($consulta)){
	            	echo "<div class='row'>";
	            	echo "<div class='col-sm-4'";
	            	echo "<br><h2>Seus dados:</h2>";
	            	echo "<p id='p'>CPF: ".$dados['alunocpf']."<br>";
	            	echo "Rua: ".$dados['alunorua']."<br>";
	            	echo "RG: ".$dados['alunorg']."<br>";
	            	echo "Bairro: ".$dados['alunobairro']."<br>";
	            	echo "E-mail: ".$dados['alunoemail']."<br> </p>";
	            	echo "<hr>";
	            	$_SESSION['CodAluno'] = $dados['CodAluno'];
	            	echo "</div>";
	            }     	
	            echo "<div class='col-sm-8'>";
	            echo "<br>";
	            include("boletim.php");
	            echo "</div>";
	            echo "</div>";
		?>
	</div>
	<script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>
