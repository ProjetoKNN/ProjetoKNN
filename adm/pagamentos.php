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
        <a href="adm_func.php"><button>Voltar</button></a>
        <form action="../adm/php/lancaPagamento.php" method="POST">
            Codigo Aluno: <input type="text" name="cod" value="" />
            <input type="submit" value="busca" />
        </form>

        <form action="php/lancapagamentocpf.php" method="POST">
        	CPF Aluno: <input type="text" name="cpf" value="" />
            <input type="submit" value="busca" />
        </form> <br>
        <script src="../jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.js"></script>
        <script src="../js/bootstrap.js"></script>
    </body>
</html>