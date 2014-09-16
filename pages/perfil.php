<?php
	session_start();
?>

<html>
<head>

<title>Mi Barrio</title>
<link rel="stylesheet" href="../css/perfil.css" media="screen" type="text/css" />

</head>
<body>

<div class='sesion-bar'>
	<a href='../php/Cerrar_sesion.php'>Cerrar sesi&oacute;n
	<img src='../resources/cerrar_sesion.png' width='20' height='20' href='#' alt="Cerrar Sesion"></a>
	
</div>

<div class="menu-bar">
	<div class='image-perfil'>
		<?php 
		include_once '../php/Modelo_Usuario.php';
		include_once '../php/Controlador_Usuario.php';

		$c_usuario = new Controlador_Usuario();
		$m_usuario = new Modelo_Usuario($c_usuario);
		$usuario=$_SESSION['nick'];	
		$m_usuario->buscar_Usuario($usuario);

			//aqui verifica si la clave dela sesion iniciada es la misma de la BD, en caso sontraio devuelve a login

		if (!isset($_SESSION['clave']))
				header("Location: ../index.php");

		elseif($c_usuario->get_Password()!=$_SESSION['clave'])
				header("Location: ../index.php");
		else{

			echo "<img src='".$c_usuario->get_Foto()."' border='0' width='180' height='200'>"; 

			echo"</div>";
			//aqui termina la div de la imagen



			echo "<h1>".$c_usuario->get_Usuario()."</h1><br>"; 
			include_once '../php/Controlador_Perfil.php';
			include_once '../php/Modelo_Perfil.php';

			$c_perfil = new Controlador_Perfil();
			$m_perfil = new Modelo_Perfil($c_perfil);

			$m_perfil->buscar_Perfil($c_usuario->get_Perfil());
			$m_perfil->desconectarBD();

				


			if($c_perfil->get_PermisoSistema()){
				echo "<div class='login-help'>";
				echo "<a href='perfil.php?gestion=sistema'>Sistema</a></div>";
			}
			if($c_perfil->get_PermisoPerfiles()){
				echo "<div class='login-help'>";
				echo "<a href='perfil.php?gestion=perfil'>Gesti&oacute;n Perfil</a></div>";
			}
			if($c_perfil->get_PermisoProductos()){
				echo "<div class='login-help'>";
				echo "<a href='#'>Productos</a></div>";
			}
			if($c_perfil->get_PermisoInventario()){
				echo "<div class='login-help'>";
				echo "<a href='#'>Inventario</a></div>";
			}
			if($c_perfil->get_PermisoFacturacion()){
				echo "<div class='login-help'>";
				echo "<a href='#'>Facturaci&oacute;n</a></div>";
			}

			if($c_perfil->get_PermisoReportes()){
				echo "<div class='login-help'>";
				echo "<a href='#'>Reportes</a></div>";
			}

			echo "<br><br><h2> Tipo de perfil: <br>".$c_perfil->get_Nombre()."</h2>";
		}


echo"</div>";

echo"<div class='contenido'>";

$recibe_pagina=$_REQUEST['gestion'];

switch ($recibe_pagina){ 
 case "perfil":
 	
   //include ("Gestion_Perfil.php"); 
 	if($c_perfil->get_PermisoPerfiles()){
 		echo "<a href='Crear_Perfil.php?gestion=crearPerfil'><div class='links2 links2-submit'>";
		echo "<b>Crear perfil</b></div></a><br><br>";

		echo "<a href='#'><div class='links2 links2-submit'>";
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
}


?>
</div>



</body>
</html>