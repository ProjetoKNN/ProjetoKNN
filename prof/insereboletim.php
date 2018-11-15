<?php

include("../conexao.php");
session_start();
if (isset($_SESSION['aluno'])) {
    $cod = $_SESSION['aluno'];
    unset($_SESSION['aluno']);
}

$media = 0;
$nota1 = filter_input(INPUT_POST, 'nota1');
$nota2 = filter_input(INPUT_POST, 'nota2');
$nota3 = filter_input(INPUT_POST, 'nota3');
$nota4 = filter_input(INPUT_POST, 'nota4');
$nota5 = filter_input(INPUT_POST, 'nota5');
$nota6 = filter_input(INPUT_POST, 'nota6');
$rep = filter_input(INPUT_POST, 'reposicao');
$contfalta = 0;

$sql = "SELECT falta FROM frequencia where aluno_cod = $cod";

$consulta = mysqli_query($conexao, $sql);

while ($dados = mysqli_fetch_assoc($consulta)) {
    if ($dados['falta'] == 1) {
        $contfalta = $contfalta + 1;
    }
}

$media = ($nota1+$nota2+$nota3+$nota4+$nota5+$nota6) / 6;

$queryNotas = "INSERT INTO boletim (falta, nota1, nota2, nota3, nota4, nota5, nota6, media, reposicao, aluno_cod) "
        . "VALUES('$contfalta', '$nota1', '$nota2', '$nota3', '$nota4', '$nota5', '$nota6', '$media', '$rep', $cod)";

$notas = mysqli_query($conexao,$queryNotas);

header("location:index_prof.php");
?>