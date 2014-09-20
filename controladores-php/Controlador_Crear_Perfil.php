<?php
	include_once '../php/Controlador_Perfil.php';
	include_once '../php/Modelo_Perfil.php';

	$nombre = $_REQUEST['nomb_Perfil'];
	$sistema= $_REQUEST['sis'];
	$perfiles= $_REQUEST['perf'];
	$productos= $_REQUEST['prod'];
	$inventario= $_REQUEST['inv'];
	$facturacion= $_REQUEST['fac'];
	$reportes= $_REQUEST['rep'];

	$c_perfil = new Controlador_Perfil();
	$c_perfil->crear_Perfil($nombre, $sistema, 
		$perfiles, $productos, $inventario, $facturacion, $reportes);
	$m_perfil=new Modelo_Perfil($c_perfil);
	$info = $m_perfil->crear_Perfil($c_perfil);
	/*if( == "exito"){
		header("Location: ../pages/Crear_Perfil.php?gestion=exito");
	}else{*/
		header("Location: ../pages/Crear_Perfil.php?gestion=".$info);
	//}
	

?>