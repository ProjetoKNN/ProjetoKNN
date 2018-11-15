<!DOCTYPE html>
<html>
    <head>
    	<title>Busca de Cursos</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
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
                                        <a href="adm_func.php" class="nav-link" name="voltar">Voltar</a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </nav>
                <div class="container" id="divBusca">
                <h3 id="h1Busca">Buscar curso</h3>
                    <form name="curso" method="POST">
                        <caption>Buscar:</caption>
                        <input type="text" name="busca" placeholder="Informe o termo de busca">
                        <input type="submit" name="buscar" class="btn btn-danger" value="Buscar">
                        <a href="inserir_turm.php" id="addAL"><button class="btn btn-danger" type="button">Inserir um novo curso</button></a>
                    </form><br><br>
                    <h2>Resultado da busca:</h2>
                    <div class="table-responsive table-striped">
                        <table class="table talbe-sm">
                            <thead class='bg-danger' style="color: white;"      >
                                <tr>
                                    <th>Nome do curso</th>
                                    <th>Remoção</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php 
                    //Estabelece a conexao com o mysql
                    include("../conexao.php");
                    if(!$conexao){
                        echo "Ops.. Erro na conexão.";
                        exit;
                    }
                        //Carrega os dados
                        if(isset($_POST['busca']))
                        {
                            $teste = $_POST['busca'];

                            $sql = "SELECT * FROM curso WHERE nome LIKE '%$teste%'";
                                if(!$sql)
                                {
                                    echo "Erro ao realizar consulta. Tente outra vez.";
                                    exit;
                                }
                            $consulta = mysqli_query($conexao, $sql);

                            while($dados = mysqli_fetch_assoc($consulta))
                            {
                                echo "<tr>";
                                echo "<td>".$dados['nome']. "</td>";
                                            
                                // Cria um formulário para remover os dados 
                                // Colocamos o id dos dados a serem removidos dentro do input hidden
                                echo "<td>";
                                echo "<form action='php/remover_curso.php' method='post'>";
                                echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
                                echo "<button class='btn btn-danger'>Remover</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                    //Área de notificações
                    //Se existe a variável remocao, então
                    if( isset($_GET['remocao'])){
                            //Se remoção tem true, os dados foram removidos
                        if( $_GET['remocao'] == "true" ){
                            echo "<div class='alert alert-success' role='alert'>
                                    Curso removido com sucesso!
                                </div>";            
                        }else{
                            echo "<div class='alert alert-success' role='alert'>
                                    Erro ao remover o curso! Tente novamente!
                                </div>";
                        }
                    } 
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <script src="../jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.js"></script>
        <script src="../js/bootstrap.js"></script>
            </body>
</html>