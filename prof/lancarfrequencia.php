<!DOCTYPE html>
<html>
    <head>
        <title>Lançar Aula</title>
    </head>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;

        }
        table{
            border:1px solid;
            padding: 5px;
        }
        td{
            border: 1px solid lightgray;
            font-size: 1em;
            padding: 5px
        }
        button{
            padding: 5px
        }
    </style>
    <body>
        <a href="index_prof.php"><button>Voltar</button></a>
        <!-- Manda dados contidos nesse formulário para a página "frequencia.php".-->
        <form action="frequencia.php" method="POST">
            <input type="submit" name="inserir" value="INSERIR">
            <input type="reset" name="limpar" value="LIMPAR">

            <?php
            include("../conexao.php");
            session_start();

            //Pega os códigos que foram passados pelo GET e os inserem em uma variável de sessão.
            //$_SESSION['aulita'] = $_GET['cod'];
            //$_SESSION['turmita'] = $_GET['codt'];

            //Passa o código da turma para um variável, para que possa ser utilizada no "sql" abaixo.
            $turma = $_SESSION['codturma'];
            $aula = $_SESSION['codaula'];
            //Seleciona alguns dados de aluno de acordo com a turma que ele foi matriculado.
            $sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

            $res = mysqli_query($conexao, $sql);

            echo "<tr>";
            echo "<table>";
            while ($r = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $r['NomeAluno'] . "</td>";
                echo "<td>" . "Presente <input type='radio' name='" . $r['CodAluno'] . "' value=0>" . "<br>Faltou <input type='radio' 	name='" . $r['CodAluno'] . "' value=1> " . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </form>

    </body>
</html>