<html>
    <?php
    include("../conexao.php");
    session_start();
    $_SESSION['aluno'] = $_GET['cod'];
    ?>
    <head>
        <title>Editar</title>
        <meta charset="UTf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    </head>
    <body>
        
        <label>Aluno <?php echo $_GET['cod']?></label>
        <form action="../prof/insereboletim.php" method="POST">
            Nota 1:
            <input type="number" name="nota1" placeholder="Insira a nota">
            Nota 2:
            <input type="number" name="nota2" placeholder="Insira a nota">
            Nota 3:
            <input type="number" name="nota3" placeholder="Insira a nota"><br><br>	
            Nota 4:
            <input type="number" name="nota4" placeholder="Insira a nota">
            Nota 5:
            <input type="number" name="nota5" placeholder="Insira a nota">
            Nota 6:
            <input type="number" name="nota6" placeholder="Insira a nota">
            Reposição:
            <input type="number" name="reposicao" placeholder="Reposição">
            <br>
            <br>
            <input class="btn btn-primary" type="submit" value="INSERIR">
            <input class="btn btn-primary" type="reset" value="LIMPAR">

        </form>
        <a class='btn btn-secondary' href='../prof/index_prof.php' role='button'>Voltar</a></td>
    <script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>