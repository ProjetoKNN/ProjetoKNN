<?php
include("../conexao.php");
session_start();
$_SESSION['aluno'] = $_GET['cod'];
?>
<html>

    <head>
        <title>Editar</title>
        <meta charset="UTf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    </head>
    <body>
    </form>

    <?php
    $CodAluno = $_GET['cod'];
    $sql = "SELECT * FROM boletim where aluno_cod = '$CodAluno'";

    $res = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($res);

    echo "<form action='salva_boletim.php' method='POST'>";
    $_SESSION['aluno'];
    for ($i = 1; $i <= 6; $i++) {
        //Utiliza de um if para checar se essa nota existe no BD, caso não exista, não irá mostrar nada, apenas as existentes.
        if ($dados['nota' . $i] != "") {
            
            echo "Nota:" . $i . " <input name='nota" . $i . "' type='number' value='" . $dados['nota' . $i] . "'><br>";
        }
    }
    echo "Media: <input name='media' type='number' value='" . $dados['media'] . "'><br>";
    echo "Faltas: <input name='falta' type='number' value='" . $dados['falta'] . "'><br>";
    echo "Reposição: <input name='rep' type='number' value='" . $dados['reposicao'] . "'><br><br>";
    echo "<input class='btn btn-primary' type='submit' value='INSERIR'><br>";
    echo "<input class='btn btn-primary' type='reset' value='LIMPAR'><br>";
    echo "</form>";
    echo "<a href='index_prof.php'><button>Voltar</button></a>";
    ?>
