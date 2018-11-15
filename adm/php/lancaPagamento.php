<?php
include_once '../../conexao.php';
session_start();

$codigoAluno = filter_input(INPUT_POST, 'cod');
$cpfAluno = filter_input(INPUT_POST, 'cpf');

$queryAluno = "SELECT aluno.nome FROM aluno WHERE cod = $codigoAluno";
$r = mysqli_query($conexao, $queryAluno);
$nome = mysqli_fetch_assoc($r)['nome'];
$_SESSION['nomeAluno'] = $nome;
echo $_SESSION['nomeAluno'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pagamento</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    </head>
    <body>
        <form action="pagamentoBD.php" method="POST">
            Valor <input type="text" name="mensa" value="" /> <br>
            Dexcrição <select name="descricao">
                <option>Mensalidade</option>
                <option>Rematricula</option>
                <option>VAN</option>
                <option>Material</option>

                <?php 
                $_SESSION['codAluno'] = $codigoAluno;
                $_SESSION['cpfAluno'] = $cpfAluno;
                ?>
            
            <!--<br>Data pagamento: <input type="date" name="data" value="" />-->
            <input type="submit" value="Enviar" />
        </form>
        <script src="../jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.js"></script>
        <script src="../js/bootstrap.js"></script>
    </body>
</html>