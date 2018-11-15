<?php
include("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Página do Professor</title>
        <meta charset="UTf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body class="BuscarAL">
            <?php
            session_start();
            $user = $_SESSION['usuario'];
            //Puxa o perfil do professor que é dono do usuário inserido ao logar.
            $query = "SELECT login.pr as cpf FROM login where usuario = '" . $user . "'";

            $resQuery = mysqli_query($conexao, $query);

            $res = mysqli_fetch_assoc($resQuery);
            $cpf = $res['cpf'];

            $sql = "SELECT professor.nome as NomeProf, professor.cod as CodProf, professor.cpf as profcpf, professor.rua as profrua, professor.rg as profrg, professor.bairro as profbairro, professor.email as profemail FROM professor where professor.cpf = '" . $cpf . "'";

            $nhe = mysqli_query($conexao,$sql);
            $nha = mysqli_fetch_assoc($nhe);
            $_SESSION['nomeProf'] = $nha['NomeProf'];
            ?>
            <nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
                <div class="container">
                    <a class="navbar-brand" id="bv">Bem-vindo, <?php echo $nha['NomeProf']; ?></a>
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
            if (!$consulta) {
                echo "Erro ao realizar consulta. Tente outra vez.";
                exit;
            }
            ?>
            <div class="row">
                <div class="col-sm-4">
            <?php
            if ($dados = mysqli_fetch_assoc($consulta)) {
                echo "<h2>Seus dados:</h2>";
                echo "<p id='p'>CPF: " . $dados['profcpf'] . "<br>";
                echo "Rua: " . $dados['profrua'] . "<br>";
                echo "RG: " . $dados['profrg'] . "<br>";
                echo "Bairro: " . $dados['profbairro'] . "<br>";
                echo "E-mail: " . $dados['profemail'] . "<br></p>";
                echo "<hr>";
            }
            ?>
                </div>
                <div class="col-sm-8" style="text-align: center;">
            <?php
            $codProf = $dados['CodProf'];
            $sql2 = "SELECT turma.cod as codturma, turma.nome FROM turma where turma.codProf = $codProf";
            echo "<h2>Turmas:</h2>";

            $resQuery2 = mysqli_query($conexao, $sql2);
            while ($res2 = mysqli_fetch_assoc($resQuery2)) {
                echo "<p id='p' style='text-align: center;'>".$res2['nome']."</p>";
                echo "<a style='' href='buscar_turmas.php?cod=" . $res2['codturma'] . "'>" . "<button class='btn btn-danger'> Boletim </button>" . "</a>";
                echo "<a href='criaraula.php?cod=" . $res2['codturma'] . "'>" . "<button style='margin-left: 10px;' class='btn btn-danger'>Lançar aula</button>" . "</a><hr>";
            }
            ?>
                </div>
                
            </div>
        </div>
    </body>
</html>
