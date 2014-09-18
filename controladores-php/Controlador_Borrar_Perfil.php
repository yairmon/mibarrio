<?php
	include_once '../php/Controlador_Perfil.php';
	include_once '../php/Modelo_Perfil.php';
	include ("../pages/perfil.php"); 

	$nombre = $_REQUEST['id'];

		if($c_perfil->get_PermisoPerfiles()){
	 			$b_perfil=new Modelo_Perfil();
				echo"$nombre";

				if($b_perfil->eliminar_Perfil($nombre)){
					header("Location: ../pages/Crear_Perfil.php?gestion=exito2");
				}else{
					header("Location: ../pages/Crear_Perfil.php?gestion=error2");
				}
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";


?>