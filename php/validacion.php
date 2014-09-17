<?php
	session_start();
	$_SESSION['nick']=$_REQUEST['user'];
	$_SESSION['clave']=$_REQUEST['pass'];



	include 'Modelo_Logueo.php';
	include 'Controlador_Logueo.php';
	// 				"Main"
	$c_Logueo = new Controlador_Logueo();
	$m_Logueo = new Modelo_Logueo($c_Logueo);
		
	$usuario = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];


	$m_Logueo->valida_Usuario($usuario,$pass);

	if($usuario == "")
		header("Location: ../index.php?error2=1");
	elseif($pass == "")
		header("Location: ../index.php?error3=1");
	elseif(!$c_Logueo->get_Acceso())
		header("Location: ../index.php?error=1");
	else
		header("Location: ../pages/Welcome.php?gestion=inicio");
	
?>