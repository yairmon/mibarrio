<?php

	include ("perfil.php"); 
	echo '<div class="contenido">';
	if($c_perfil->get_PermisoSistema())	{
		$perfil= $_REQUEST['id'];

				echo "
					<form action='../controladores-php/Controlador_Borrar_Perfil.php?id=".$perfil."' method='post'>
					<h1>Est&aacute; seguro de que quiere eliminar el perfil ".$perfil."?</h1><p>
					<input type='submit' name='eliminarP' class='login login-submit' value='Eliminar Perfil'>
				";


	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";

	echo "</div>";
	
?>
