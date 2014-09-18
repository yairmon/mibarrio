<?php

	include ("perfil.php"); 
	
	echo"<div class='contenido'>";

	$recibe_pagina=$_REQUEST['gestion'];

	switch ($recibe_pagina){ 
	 case "perfil":
	 	
	   //include ("Gestion_Perfil.php"); 
	 	if($c_perfil->get_PermisoPerfiles()){
	 		echo "<a href='Crear_Perfil.php?gestion=crearPerfil'><div class='links2 links2-submit'>";
			echo "<b>Crear perfil</b></div></a><br><br>";

			echo "<a href='Crear_Perfil.php?gestion=visualizar'><div class='links2 links2-submit'>";
			echo "<b>Visualizar perfil</b></div></a>";
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";
	 	

		break;
		case "boton2":
		  include ("contenido2.php"); 
		break; 
		case "boton3":
		  include ("contenido3.php"); 
		break; 
		default:
			echo "<h1><b>Bienvenido, ".$c_usuario->get_Nombres().".</b></h1>";
		break;
		
	}
	echo "</div>";	
?>