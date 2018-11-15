<?php

include("../conexao.php");
mysqli_set_charset($conexao, "utf-8");
date_default_timezone_set('America/Sao_Paulo');
session_start();
//Pega o código da turma através do GET.
$turma = $_POST['turma'];
if (isset($_POST['inserir'])) {
    $conteudo = $_POST['conteudo'];
    $dataaula = $_POST['dataaula'];

//Faz a seleção do último cod inserido na tabela aulas.
    $query1 = "SELECT MAX(cod) FROM aulas";
    $cod = mysqli_query($conexao, $query1);
    $codigo = mysqli_fetch_assoc($cod);

//Cria um AI manual.
    $num = $codigo['MAX(cod)'] + 1;

    $_SESSION['codaula'] = $num;

    $_SESSION['codturma'] = $turma;

//Faz a inserção da aula na tabela aulas contida no BD.
    $query = "INSERT INTO aulas(cod, conteudo, dataaula, turma_cod) VALUES ('$num','$conteudo','$dataaula', '$turma')";
    $aula = mysqli_query($conexao, $query);

    if (!$aula) {
         header("location:index_prof.php?false");
        echo "Erro ao realizar cadastro da aula. Tente outra vez.";
        exit;
    }else{
        $_SESSION['codaula'];
        $_SESSION['codturma'];

        header("location:lancarfrequencia.php");
    }
}
//Manda o código da aula que foi inserida e o código da turma através de GET.
echo "<br><a href='lancarfrequencia.php?cod=" . $num . "&codt=" . $turma . "'>" . " <button>Lançar Frequência</button>" . "</a><br>";
?>