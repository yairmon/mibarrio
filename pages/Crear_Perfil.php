<?php
	session_start();
	include_once '../php/bd.php';
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

		include_once '../php/bd.php';

			$baseDs=new BD("base1", "root");

			$url="";
			$pass="";
			$nom_Usuario;
			$usuario=$_SESSION['nick'];

			$baseDs->conectar();
			$sql = "select Foto,Password,Nombres from usuarios where Usuario='$usuario'";
			$registros = $baseDs->consultar($sql);

			if ($reg=mysql_fetch_array($registros))
				//obtiene la foto y la clave de el usuario
				$url = $reg['Foto'];
				$pass = $reg['Password'];
				$nom_Usuario = $reg['Nombres'];
				

			$baseDs->desconectar();

			//aqui verifica si la clave dela sesion iniciada es la misma de la BD, en caso sontraio devuelve a login

if($pass!=$_SESSION['clave'])
		header("Location: ../index.php");
	else{

			echo "<img src='$url' border='0' width='180' height='200'>"; 

echo"</div>";
//aqui termina la div de la imagen

	include '../php/Controlador_Logueo.php';
	include '../php/Modelo_Logueo.php';


	echo "<h1>$nom_Usuario</h1><br>"; 

	$controlador = new Controlador_Logueo();
	$validar = new Modelo_Logueo($controlador);

	$validar = new Modelo_Logueo();
	$nombre_Perfil=$validar->identifica_Perfil($usuario);



	$nombre;
	$sistema;
	$perfiles;
	$productos;
	$inventario;
	$facturacion;
		
	/*
	$conexion=mysql_connect("localhost","root","") or
	  die("Problemas en la conexion");
	mysql_select_db("base1",$conexion) or
	  die("Problemas en la selección de la base de datos");

	$registros=mysql_query("select Nombre_Perfil,Sistema,Perfiles,Productos,Inventario,Facturacion, Reportes
	                        from perfiles where Nombre_Perfil='$nombre_Perfil'",$conexion) or
	  die("Problemas en el select:".mysql_error());
	 */
	$baseDs->conectar();
	$sql1 = "select Nombre,Sistema,Perfiles,Productos,Inventario,Facturacion, Reportes
	                        from perfiles where Nombre='$nombre_Perfil'";
	$registros1 = $baseDs->consultar($sql1);

	if ($reg=mysql_fetch_array($registros1))
	{
		$nombre = $reg['Nombre'];
		$sistema= $reg['Sistema'];
		$perfiles= $reg['Perfiles'];
		$productos= $reg['Productos'];
		$inventario= $reg['Inventario'];
		$facturacion= $reg['Facturacion'];
		$reportes= $reg['Reportes'];		
	}

	$baseDs->desconectar();


	if($sistema==true){
		echo "<div class='login-help'>";
		echo "<a href='perfil.php?gestion=sistema'>Sistema</a></div>";
	}
	if($perfiles==true){
		echo "<div class='login-help'>";
		echo "<a href='perfil.php?gestion=perfil'>Gesti&oacute;n Perfil</a></div>";
	}
	if($productos==true){
		echo "<div class='login-help'>";
		echo "<a href='#'>Productos</a></div>";
	}
	if($inventario==true){
		echo "<div class='login-help'>";
		echo "<a href='#'>Inventario</a></div>";
	}
	if($facturacion==true){
		echo "<div class='login-help'>";
		echo "<a href='#'>Facturaci&oacute;n</a></div>";
	}

	if($reportes==true){
		echo "<div class='login-help'>";
		echo "<a href='#'>Reportes</a></div>";
	}

	echo "<br><br><h2> Tipo de perfil: <br>$nombre_Perfil</h2>";
}

?>

</div>

<div class="contenido">

<?php
$recibe_pagina=$_REQUEST['gestion'];

switch ($recibe_pagina){ 
 case "crearPerfil":
 	//todo lo de crear perfil

 		echo "Nombre del perfil:<br/>";
		echo "<input type='text' name='nomPerfilNew' value='' placeholder='Escriba el nombre del perfil'/><br><br><br>";
		echo "<table>
					<tr>
					  <td><strong>Permiso</strong></td>
					  <td><strong>S&iacute;</strong></td>
					  <td><strong>No</strong></td>
					</tr>
					 
					<tr>
					  <td>Sistema</td>
					  <td><input type='radio' name='sis' value='true' /></td>
					  <td><input type='radio' name='sis' value='false' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Perfiles</td>
					  <td><input type='radio' name='perf' value='true' /></td>
					  <td><input type='radio' name='perf' value='false' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Productos</td>
					  <td><input type='radio' name='prod' value='true' /></td>
					  <td><input type='radio' name='prod' value='false' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Inventario</td>
					  <td><input type='radio' name='inv' value='true' /></td>
					  <td><input type='radio' name='inv' value='false' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Facturacion</td>
					  <td><input type='radio' name='fac' value='true' /></td>
					  <td><input type='radio' name='fac' value='false' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Reportes</td>
					  <td><input type='radio' name='rep' value='true' /></td>
					  <td><input type='radio' name='rep' value='false' checked='checked' /></td>
					</tr>
			</table>";



break;
case "boton2":
  include ("contenido2.php"); 
break; 
case "boton3":
  include ("contenido3.php"); 
break; 
default:
echo "<h1><b>Bienvenido, $nom_Usuario.</b></h1>";
}


?>
</div>



</body>
</html>




