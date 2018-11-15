<!DOCTYPE html>
<html>
    <head>
        <title>Lançar Aula</title>
    </head>
    <body>
        <a href="index_prof.php"><button>Voltar</button></a>
        <form action="insereaulabd.php" method="POST">
            Turma: 
            <input type="text" name="turma"  required="true" value="<?php echo  $_GET['cod'];?>"><br>            
            Conteudo:
            <input type="text" name="conteudo" placeholder="Insira o conteúdo da aula" required="true">
            <input type="date" name="dataaula">
            <input type="submit" name="inserir" value="INSERIR">
            <input type="reset" name="limpar" value="LIMPAR">
        </form>
    </body>
</html>