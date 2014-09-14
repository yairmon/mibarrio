<?php

	include 'Controlador_Logueo.php';
	include 'Modelo_Logueo.php';
	
	$controlador = new Controlador_Logueo();
	$validar = new Modelo_Logueo($controlador);

	$usuario = $_REQUEST['user'];

	$validar->pregunta_Usuario($usuario);
	echo "<br>Usuario: $usuario";

	$pregunta = $controlador->get_Pregunta();	
	if ($pregunta=="") 
		header("Location: Contra.php?error=1");
	else{
		echo "<br>La pregunta es: $pregunta";
	}

?>