<?php

	include ("perfil.php"); 
	
	echo"<div class='contenido'>";

	$nombre = $_REQUEST['id'];
	$nombre2 = $nombre;
	$c_perfil2 = clone $c_perfil;
	$m_perfil2 = new Modelo_Perfil($c_perfil2);
	$m_perfil2->buscar_Perfil($nombre);

	/*echo '<td>
		<p>nombre = '.$c_perfil2->get_Nombre().'
		<p>sistema = '.$c_perfil2->get_PermisoSistema().'
		<p>perfiles = '.$c_perfil2->get_PermisoPerfiles().'
		<p>productos = '.$c_perfil2->get_PermisoProductos().'
		<p>inventario = '.$c_perfil2->get_PermisoInventario().'
		<p>factu = '.$c_perfil2->get_PermisoFacturacion().'
		<p>report = '.$c_perfil2->get_PermisoReportes().'
	';*/
if($c_perfil->get_PermisoPerfiles()){

 		echo"<form action='../controladores-php/Controlador_Modificar_Perfil.php?perfil=".$nombre2."' method='post'>";


		echo "<div class='CSSTableGenerator' >
                <table >
                	<tr>

                        <td colspan='2'>
                            Ingrese nuevos datos para el perfil: ".$nombre."
                        </td>
                     <tr> 
                     
                      <tr>
                        <td>
                            Nombre del perfil:
                        </td>
                        <td > 
                        	<input type='text' name='newnomb' value='".$nombre."' required='required' maxlength=50/>
                        </td>
                     </tr>	
                </table>
            </div><br><br>";


		echo "<div class='CSSTableGenerator'><table>
					<tr>
					  <td><strong>Permiso</strong></td>
					  <td><strong>S&iacute;</strong></td>
					  <td><strong>No</strong></td>
					</tr>
					 
					<tr>
					  <td>Sistema</td>";
					  if($c_perfil2->get_PermisoSistema()){
						  echo "
						  <td><input type='radio' name='newsis' value='1' checked='checked'/></td>
						  <td><input type='radio' name='newsis' value='0'/></td>";
					  }else {
						  echo "
						  <td><input type='radio' name='newsis' value='1' /></td>
						  <td><input type='radio' name='newsis' value='0' checked='checked' /></td>";
					  }
					  echo "
					</tr>
					 
					<tr>
					  <td>Perfiles</td>";
					if($c_perfil2->get_PermisoPerfiles()){
						echo "
						<td><input type='radio' name='newperf' value='1' checked='checked'/></td>
						<td><input type='radio' name='newperf' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newperf' value='1' /></td>
						<td><input type='radio' name='newperf' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>
					 
					<tr>
					  <td>Productos</td>";
					if($c_perfil2->get_PermisoProductos()){
						echo "
						<td><input type='radio' name='newprod' value='1' checked='checked'/></td>
						<td><input type='radio' name='newprod' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newprod' value='1' /></td>
						<td><input type='radio' name='newprod' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Inventario</td>";
					if($c_perfil2->get_PermisoInventario()){
						echo "
						<td><input type='radio' name='newinv' value='1' checked='checked'/></td>
						<td><input type='radio' name='newinv' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newinv' value='1' /></td>
						<td><input type='radio' name='newinv' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Facturaci&oacute;n</td>";
					if($c_perfil2->get_PermisoFacturacion()){
						echo "
						<td><input type='radio' name='newfac' value='1' checked='checked'/></td>
						<td><input type='radio' name='newfac' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newfac' value='1' /></td>
						<td><input type='radio' name='newfac' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Reportes</td>";
					if($c_perfil2->get_PermisoReportes()){
						echo "
						<td><input type='radio' name='newrep' value='1' checked='checked'/></td>
						<td><input type='radio' name='newrep' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newrep' value='1' /></td>
						<td><input type='radio' name='newrep' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  
					  <td colspan='3'><br></td>
					</tr>

					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>

					  <input type='submit' name='actualizar' class='login login-submit' value='Modificar Perfil'>

					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>

					  <input type='reset' name='borrarCampos' class='login login-submit' value='Borrar Campos'>

					  </td>
					</tr>

			</table></div>";

		echo"</fomr>";
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";

	echo "</div>";	
?>
