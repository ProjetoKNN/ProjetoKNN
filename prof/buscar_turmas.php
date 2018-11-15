<!DOCTYPE html>
<?php
session_start();
include("../conexao.php");
?>
<html>
    <head>
        <title>Turma</title>
        <meta charset="UTf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    </head>
    <body class="BuscarAL">
        <nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
                <div class="container">
                    <a class="navbar-brand" id="bv">Bem-vindo, <?php echo $_SESSION['nomeProf']; ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSite">   
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="../prof/index_prof.php" class="nav-link" name="voltar">Voltar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
        <?php
        $_SESSION['turmona'] = $_GET['cod'];
        $turma = $_SESSION['turmona'];
        //Faz a seleção do nome dos alunos de acordo com a turma em que foram matriculados.
        $sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

        $res = mysqli_query($conexao, $sql);
        echo "<br><br>";
        echo "<div class='table-responsive table-striped'>";
        echo "<table class='table table-sm'>";
        echo "<thead class='bg-danger' style='color: white;'>";
        echo "<tr>";
        echo "<th>Aluno</th>";
        echo "<th>Inserir Boletim</th>";
        echo "<th>Editar Boletim</th>";
        echo "</tr>";
        echo "</thead>";
        while ($r = mysqli_fetch_assoc($res)) {

            echo "<tr>";
            echo "<td>" . $r['NomeAluno'] . "</td>";
            echo "<td><a class='btn btn-danger' href='../prof/inserir_boletim.php?cod=" . $r['CodAluno'] . "' role='button'>Inserir</a></td>";
            echo "<td><a class='btn btn-danger' href='../prof/edita_boletim.php?cod=" . $r['CodAluno'] . "' role='button'>Visualizar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
        <a class='btn btn-secondary' href='../prof/index_prof.php' role='button'>Voltar</a>
    <script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>