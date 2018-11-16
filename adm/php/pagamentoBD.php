<?php
include ("../../conexao.php");
session_start();
$nome = $_SESSION['nomeAluno'];
unset($_SESSION['nomeAluno']);
echo "AQUI ".$_SESSION['codAluno'];
if (isset($_SESSION['codAluno'])) 
{
    $codigoAluno = $_SESSION['codAluno'];
    unset($_SESSION['codAluno']);
}

$valor = filter_input(INPUT_POST, 'mensa');
$descricao = filter_input(INPUT_POST, 'descricao');

$sql = "INSERT INTO pagamentos(codAluno, valor, datamat, descricao) VALUES ('$codigoAluno', '$valor', NOW(), '$descricao')";

$query = mysqli_query($conexao, $sql);
header("location:../pagamentos.php");
?>