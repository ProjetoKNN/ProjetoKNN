<?php

include("../conexao.php");
session_start();

if (isset($_SESSION['aluno'])) {
    $codAluno = $_SESSION['aluno'];
    unset($_SESSION['aluno']);
}
echo "AQUI " . $codAluno;


$nota1 = filter_input(INPUT_POST, 'nota1');
$nota2 = filter_input(INPUT_POST, 'nota2');
$nota3 = filter_input(INPUT_POST, 'nota3');
$nota4 = filter_input(INPUT_POST, 'nota4');
$nota5 = filter_input(INPUT_POST, 'nota5');
$nota6 = filter_input(INPUT_POST, 'nota6');
$media = filter_input(INPUT_POST, 'media');
$falta = filter_input(INPUT_POST, 'falta');
$rep = filter_input(INPUT_POST, 'rep');

$queryUpdate = "UPDATE boletim SET falta='" . $falta . "', nota1='" . $nota1 . "', nota2='" . $nota2 . "', nota3='" . $nota3 . "', nota4='" . $nota4 . "', "
        . "nota5='" . $nota5 . "', nota6='" . $nota6 . "', media='" . $media . "', reposicao='" . $rep . "' where aluno_cod ='" . $codAluno . "'";
$update = mysqli_query($conexao, $queryUpdate);

if (!$update) {
    header("Location:index_prof.php?alteracao=false");
    exit;
} else {
    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:index_prof.php?alteracao=true");
}