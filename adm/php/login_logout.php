<?php
	session_start();
	unset($_SESSION['privilegio']);
	unset($_SESSION['usuario']);
	header("location:../../index.php");
?>