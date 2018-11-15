<?php

include_once("../conexao.php");
session_start();

//Coloca o código da turma e da aula que foram passados pela SESSION dentro de variáveis.
$turma = $_SESSION['codturma'];
$aula = $_SESSION['codaula'];

$queryAluno = "SELECT aluno.cod FROM aluno";

$result = mysqli_query($conexao, $queryAluno);




while ($r = mysqli_fetch_assoc($result)) {
    //Pega o código do aluno e o número 1 ou 0, que significa se ele faltou ou não, sendo 1 = FALTOU e 0 = PRESENTE.
    $codAl = $r['cod'];
    $contfalta = 0;
    $faluno = $_POST[$codAl]; //Recebe um post de alunos que existem no lancarfrequencia.php

    if (isset($faluno)) {

        $sql = "SELECT falta FROM frequencia where aluno_cod = $codAl";

        $consulta = mysqli_query($conexao, $sql);

        while ($dados = mysqli_fetch_assoc($consulta)) {
            if ($dados['falta'] == 1) {
                $contfalta = $contfalta + 1;
            }
        }

        if ($faluno == 1) {
            $contfalta ++;
            $query = mysqli_query($conexao, "INSERT INTO frequencia (aluno_cod, aulas_cod, falta) VALUES('$codAl','$aula','1' )");
        }
        else if($faluno == 0) {
            $query = mysqli_query($conexao, "INSERT INTO frequencia (aluno_cod, aulas_cod, falta) VALUES('$codAl','$aula','0' )");
        }
        $sql = "UPDATE boletim SET falta ='$contfalta' WHERE aluno_cod = $codAl";

        $altera = mysqli_query($conexao, $sql);

        unset($_SESSION['codturma']);
        unset($_SESSION['codaula']);

        header("location:index_prof.php");
    }
}
?>