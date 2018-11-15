<html>
    <?php 
    include("../conexao.php");
    ?>
    <head>
        <title>Editar Turma</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo.css" type="text/css">
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
    </head>

    <?php
        $consProf = mysqli_query($conexao,"SELECT * FROM professor");
            if( !$consProf ){
                echo "Erro ao realizar consulta. Tente outra vez.";
                exit;
            }
        $consCurs = mysqli_query($conexao,"SELECT * FROM curso");
            if(!$consCurs){
                echo "Erro ao realizar consulta. Tente outra vez.";
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
                                    <a href="buscar_turm.php" class="nav-link" name="voltar">Voltar</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
        <?php 
            //Recebe os dados a serem editados
            $cod = filter_input(INPUT_POST, 'cod');
            $nome = filter_input(INPUT_POST, 'nome');
            $prof = filter_input(INPUT_POST, 'codProf');
            $qtd = filter_input(INPUT_POST, 'qtd');
            $curso = filter_input(INPUT_POST, 'curso_cod');
        ?>
        <div class="container">
            <h3 id="h1Busca">Alterar dados</h3>
        <form action="php/salva_turm.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
            <input type="hidden" name="cod" value="<?php echo $cod; ?>">
            Nome da Turma:<input class="form-control" type="text" name="nome" value="<?php echo $nome; ?>"><br>
                Professor:
                <select class="form-control" name='prof'>
                    <?php
                        while($prof = mysqli_fetch_assoc($consProf))
                        {
                            echo "<option  value=".$prof['cod'].">".$prof['nome']."</option>";
                        }
                    ?>                
                </select><br>
                Curso:<select class="form-control" name='codCurso'>
                    <?php
                        while ($curs = mysqli_fetch_assoc($consCurs)) {
                            echo "<option value=".$curs['cod'].">".$curs['nome']."</option>";
                        }
                    ?>
                </select><br>
                Quantidade de Alunos:<input class="form-control" type="text" name="qtd" value="<?php echo $qtd; ?>"><br>
                <input type="submit" class="btn btn-danger" style="width: 100%;" value="Salvar alterações">
        </form>
    </div>
    </body>
</html>