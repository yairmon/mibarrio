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

				

			$enlace_sistema = "bajo";
			if($c_perfil->get_PermisoSistema()){
				$enlace_sistema = "alto";
			}
			echo "<div class='login-help'>";
			echo "<a href='Sistema.php?gestion=$enlace_sistema'>Sistema</a></div>";

			if($c_perfil->get_PermisoPerfiles()){
				echo "<div class='login-help'>";
				echo "<a href='Gestor_Perfil.php?gestion=perfil'>Gesti&oacute;n Perfil</a></div>";
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
/*
*/

?>



</body>
</html>