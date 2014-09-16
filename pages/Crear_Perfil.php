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
 case "crearPerfil":
 	//todo lo de crear perfil
 	if($c_perfil->get_PermisoPerfiles()){
 		echo"<form action='../controladores-php/Controlador_Crear_Perfil.php' method='post'>";


		echo "<div class='CSSTableGenerator' >
                <table >
                	<tr>
                        <td colspan='2'>
                            Datos del nuevo perfil:
                        </td>
                     <tr> 

                    <tr>
                        <td>
                            Nombre del perfil:
                        </td>
                        <td >
                            <input type='text' name='nomb_Perfil' value='' placeholder='Escriba el nombre del perfil' required='required'/>
                        </td>
                     <tr>   
                </table>
            </div><br><br>";


		echo "<div class='CSSTableGenerator'><table>
					<tr>
					  <td><strong>Permiso</strong></td>
					  <td><strong>S&iacute;</strong></td>
					  <td><strong>No</strong></td>
					</tr>
					 
					<tr>
					  <td>Sistema</td>
					  <td><input type='radio' name='sis' value='1' /></td>
					  <td><input type='radio' name='sis' value='0' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Perfiles</td>
					  <td><input type='radio' name='perf' value='1' /></td>
					  <td><input type='radio' name='perf' value='0' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Productos</td>
					  <td><input type='radio' name='prod' value='1' /></td>
					  <td><input type='radio' name='prod' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Inventario</td>
					  <td><input type='radio' name='inv' value='1' /></td>
					  <td><input type='radio' name='inv' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Facturacion</td>
					  <td><input type='radio' name='fac' value='1' /></td>
					  <td><input type='radio' name='fac' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Reportes</td>
					  <td><input type='radio' name='rep' value='1' /></td>
					  <td><input type='radio' name='rep' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  
					  <td colspan='3'><br></td>
					</tr>

					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>

					  <input type='submit' name='crear' class='login login-submit' value='Crear'>

					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>

					  <input type='reset' name='borrar' class='login login-submit' value='Borrar'>

					  </td>
					</tr>

			</table></div>";

		echo"</fomr>";

 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";

break;
case "exito":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>Se ha creado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break; 
case "error":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha creado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
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