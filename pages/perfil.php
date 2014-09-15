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
			$url = $reg['Foto'];
			

		mysql_close($conexion);

		echo "<img src='$url' border='0' width='180' height='200'>"; 



	 ?>


</div>	

<?php
	include '../php/Controlador_Logueo.php';
	include '../php/Modelo_Logueo.php';
	include '../php/Controlador_Perfil.php';
	include '../php/Modelo_Perfil.php';

	$usuario=$_REQUEST['id'];

	echo "<h1>$usuario</h1><br>"; 

	$controlador1 = new Controlador_Logueo();
	$validar1 = new Modelo_Logueo($controlador1);

	$validar1 = new Modelo_Logueo();
	$nombre_Perfil=$validar1->identifica_Perfil($usuario);

	$perfil = new Controlador_Perfil();
	$validar2 = new Modelo_Perfil($perfil);

	$validar2->buscar_Perfil($nombre_Perfil);



	if($perfil->get_Permiso_Sistema()){
		echo "<div class='login-help'>";
		echo "<a href='php/Contra.php'>Sistema</a></div>";
	}
	if($perfil->get_Permiso_Perfiles()){
		echo "<div class='login-help'>";
		echo "<a href='#'>Perfiles</a></div>";
	}
	if($perfil->get_Permiso_Productos()){
		echo "<div class='login-help'>";
		echo "<a href='#'>Productos</a></div>";
	}
	if($perfil->get_Permiso_Inventario()){
		echo "<div class='login-help'>";
		echo "<a href='#'>Inventario</a></div>";
	}
	if($perfil->get_Permiso_Facturacion()){
		echo "<div class='login-help'>";
		echo "<a href='#'>Facturacion</a></div>";
	}


?>

	



</div>

</body>
</html>
