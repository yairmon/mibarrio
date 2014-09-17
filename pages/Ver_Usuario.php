<?php

	include ("perfil.php"); 

	echo"<div class='contenido'>";


	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$tam = 2;
	echo "<table border=1>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Documento</font></td>
			<td><font size=$tam>Nombres</font></td>
			<td><font size=$tam>Apellidos</font></td>
			<td><font size=$tam>Usuario</font></td>
			<td><font size=$tam>Password</font></td>
			<td><font size=$tam>Pregunta</font></td>
			<td><font size=$tam>Respuesta</font></td>
			<td><font size=$tam>Tipo Id</font></td>
			<td><font size=$tam>Ciudad</font></td>
			<td><font size=$tam>Direccion</font></td>
			<td><font size=$tam>Edad</font></td>
			<td><font size=$tam>Foto</font></td>
			<td><font size=$tam>Celular</font></td>
			<td><font size=$tam>Email</font></td>
			<td><font size=$tam>Genero</font></td>
			<td><font size=$tam>Perfil</font></td>
		</tr>
			</font> 
	";
 	if($c_perfil->get_PermisoSistema()){
 		echo"<form action='Buscar.php' method='post'>";
 		echo "
 			<input type='text' name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required'/>
 			<input type='submit' name='buscar' class='login login-submit' value='Buscar'>
 			";
 		echo "</form>";
 		$usuarios = $m_usuario->mostrar_Todos();
 		$tam_usuarios = count($usuarios);
 		$recibe *= 10;
 		$fin = $recibe + 10;
 		for($i = $recibe; $i < $fin && $i < $tam_usuarios; $i++){
			echo "
				<tr>
					<td><font size=1>
						<a href='Modificar_Usuario.php?gestion=".$usuarios[$i][0]."'>
						Editar</a></font></td>
					<td><font size=$tam>".$usuarios[$i][0]."</font></td>
					<td><font size=$tam>".$usuarios[$i][1]."</font></td>
					<td><font size=$tam>".$usuarios[$i][2]."</font></td>
					<td><font size=$tam>".$usuarios[$i][3]."</font></td>
					<td><font size=$tam>".$usuarios[$i][4]."</font></td>
					<td><font size=$tam>".$usuarios[$i][5]."</font></td>
					<td><font size=$tam>".$usuarios[$i][6]."</font></td>
					<td><font size=$tam>".$usuarios[$i][7]."</font></td>
					<td><font size=$tam>".$usuarios[$i][8]."</font></td>
					<td><font size=$tam>".$usuarios[$i][9]."</font></td>
					<td><font size=$tam>".$usuarios[$i][10]."</font></td>
					<td><font size=$tam><a href='".$usuarios[$i][11]."' target=blank>
							URL</a></font></td>
					<td><font size=$tam>".$usuarios[$i][12]."</font></td>
					<td><font size=$tam>".$usuarios[$i][13]."</font></td>
					<td><font size=$tam>".$usuarios[$i][14]."</font></td>
					<td><font size=$tam>".$usuarios[$i][15]."</font></td>
				</tr>";
 			
 		}
 		if($fin < $tam_usuarios){
 			$recibe_pagina++;
 			echo '
 				<tr>
 					<td colspan=16><font size=$tam>
 					<a href = "Ver_Usuario.php?page='.$recibe_pagina.'">
 						Siguiente
					</font></a></td>
 				<tr>
 			';
 		}

		echo "</table>";
 		
 	
 		
 	}else{
 		// Parte para el perfil sin permisos de ver a otros usuarios
		echo "
			<tr>
				<td><font size=1>
					<a href='Modificar_Usuario.php?gestion=".$c_usuario->get_Nid()."'>
					Editar</a></font></td>
				<td><font size=$tam>".$c_usuario->get_Nid()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Nombres()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Apellidos()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Usuario()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Password()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Pregunta()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Respuesta()."</font></td>
				<td><font size=$tam>".$c_usuario->get_TipoId()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Ciudad()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Direccion()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Edad()."</font></td>
					<td><font size=$tam><a href='".$c_usuario->get_Foto()."' target=blank>
							URL</a></font></td>
				<td><font size=$tam>".$c_usuario->get_Celular()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Email()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Genero()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Perfil()."</font></td>
			</tr>
			</table>
		";
 	
 	}

	echo "</table></div>";	
?>