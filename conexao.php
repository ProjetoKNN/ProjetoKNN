<?php
	//Cria a conexão com o Banco de Dados.
	$conexao = mysqli_connect("localhost", "root", "", "knn") or die ("Falha na conexao!");
	mysqli_set_charset($conexao,"utf-8");
?>