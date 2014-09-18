<?php
	include_once '../php/Controlador_Perfil.php';
	include_once '../php/Modelo_Perfil.php';

	$nombre = $_REQUEST['newnomb'];
	$sistema= $_REQUEST['newsis'];
	$perfiles= $_REQUEST['newperf'];
	$productos= $_REQUEST['newprod'];
	$inventario= $_REQUEST['newinv'];
	$facturacion= $_REQUEST['newfac'];
	$reportes= $_REQUEST['newrep'];

	$new_c_perfil = new Controlador_Perfil();
	$new_c_perfil->crear_Perfil($nombre, $sistema, 
		$perfiles, $productos, $inventario, $facturacion, $reportes);
	$new_m_perfil=new Modelo_Perfil($new_c_perfil);
	if($new_m_perfil->modificar_Perfil($_REQUEST['perfil'])){
		header("Location: ../pages/Crear_Perfil.php?gestion=exito3");
	}else{
		header("Location: ../pages/Crear_Perfil.php?gestion=error3");
	}
	

?>
