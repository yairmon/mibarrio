<?php

	include ("perfil.php"); 
	
	echo"<div class='contenido'>";

	$nombre = $_REQUEST['id'];

if($c_perfil->get_PermisoPerfiles()){

 		echo"<form action='../controladores-php/Controlador_Modificar_Perfil.php' method='post'>";


		echo "<div class='CSSTableGenerator' >
                <table >
                	<tr>
                        <td colspan='2'>
                            Ingrese nuevos datos para el perfil: ".$nombre."
                            <input type='text' name='nomb' class='login login-submit' value='".$nombre."' >
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
					  <td><input type='radio' name='newsis' value='1' /></td>
					  <td><input type='radio' name='newsis' value='0' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Perfiles</td>
					  <td><input type='radio' name='newperf' value='1' /></td>
					  <td><input type='radio' name='newperf' value='0' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Productos</td>
					  <td><input type='radio' name='newprod' value='1' /></td>
					  <td><input type='radio' name='newprod' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Inventario</td>
					  <td><input type='radio' name='newinv' value='1' /></td>
					  <td><input type='radio' name='newinv' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Facturacion</td>
					  <td><input type='radio' name='newfac' value='1' /></td>
					  <td><input type='radio' name='newfac' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Reportes</td>
					  <td><input type='radio' name='newrep' value='1' /></td>
					  <td><input type='radio' name='newrep' value='0' checked='checked' /></td>
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