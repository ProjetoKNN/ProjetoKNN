<?php
	//Verifica qual o tipo de privilégio o usuário logado contém, sejam eles "usr" = usuário normal, "prf" = professor e "adm" = administrador.
	session_start();
	if($_SESSION['privilegio']){
		if($_SESSION['privilegio'] == "usr")
		{
			header('location:aluno/index_aluno.php');
		}
		if($_SESSION['privilegio'] == "prf")
		{
			header('location:prof/index_prof.php');
		}
		if($_SESSION['privilegio'] == "adm")
		{
			header('location:adm/adm_func.php');
		}
	}else
		{
			header('location:index.php?status=2');
		}
?>
