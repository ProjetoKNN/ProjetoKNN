<?php
	//Quebra a variável de sessão ao clicar no botão "SAIR".
	session_start();
	//session_destroy();
	unset($_SESSION['privilegio']);
	unset($_SESSION['usuario']);
	header("location:index.php");
?>