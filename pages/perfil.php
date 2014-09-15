<html>
<head>
<title>Mi Barrio</title>
<link rel="stylesheet" href="../css/perfil.css" media="screen" type="text/css" />
</head>
<body>

<div class="menu-bar">
	<div class='image-perfil'>
	<?php 

	$url="";
	$usuario=$_REQUEST['id'];

			$conexion=mysql_connect("localhost","root","") or
			  die("Problemas en la conexion");
			mysql_select_db("base1",$conexion) or
			  die("Problemas en la selección de la base de datos");

			$registros=mysql_query("select Foto
			                        from usuarios where Usuario='$usuario'",$conexion) or
			  die("Problemas en el select:".mysql_error());

			if ($reg=mysql_fetch_array($registros))
			{
			$url = $reg['Foto'];
			}

		mysql_close($conexion);

	echo "<img src='$url' border='0' width='180' height='200'>"; 



	 ?>


	</div>

<?php
include '../php/Controlador_Logueo.php';
include '../php/Modelo_Logueo.php';

$usuario=$_REQUEST['id'];

echo "<h1>$usuario</h1><br>"; 

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
	

			$conexion=mysql_connect("localhost","root","") or
			  die("Problemas en la conexion");
			mysql_select_db("base1",$conexion) or
			  die("Problemas en la selección de la base de datos");

			$registros=mysql_query("select Nombre,Sistema,Perfiles,Productos,Inventario,Facturacion
			                        from perfiles where Nombre='$nombre_Perfil'",$conexion) or
			  die("Problemas en el select:".mysql_error());

			if ($reg=mysql_fetch_array($registros))
			{
			$nombre = $reg['Nombre'];
			$sistema= $reg['Sistema'];
			$perfiles= $reg['Perfiles'];
			$productos= $reg['Productos'];
			$inventario= $reg['Inventario'];
			$facturacion= $reg['Facturacion'];		
		}

		mysql_close($conexion);


if($sistema==true){
	echo "<div class='login-help'>";
	echo "<a href='php/Contra.php'>Sistema</a></div>";
}
if($perfiles==true){
	echo "<div class='login-help'>";
	echo "<a href='#'>Perfiles</a></div>";
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
	echo "<a href='#'>Facturacion</a></div>";
}


?>

	



</div>

</body>
</html>