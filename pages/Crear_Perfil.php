<?php

	include ("perfil.php"); 
	
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
                            <input type='text' name='nomb_Perfil' value='' placeholder='Escriba el nombre del perfil' required='required' maxlength=50/>
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

					  <input type='submit' name='crear' class='login login-submit' value='Crear Perfil'>

					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>

					  <input type='reset' name='borrar' class='login login-submit' value='Borrar Campos'>

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
case "visualizar":
  		
		//include_once '../controladores-php/selecionar.php';
			
		$data=$m_perfil->mostrar_Todos();
		
			

		echo"<form action='Crear_Perfil.php?gestion=visualizar-seleccion' method='post'>

		<div class='CSSTableGenerator'><table>

		<tr>
		<td colspan='2'>
                     Selecciona un perfil:
        </td>
		</tr>

		<tr>
		<td>
			<select name='Nombre_perfil' class='select'>";
				       
		for($i=0; $i<count($data); $i++)
		{
			echo "<option value='"; 
			echo "".$data[$i][0]."'>";
			echo "".$data[$i][0]."</option>";	
		}
		
		echo"</select>
		</td>";	

		echo"<td>
		<input type='submit' name='visualizar' class='login login-submit' value='Visualizar'>
		</td>";
		echo"<tr>";

break; 
case "visualizar-seleccion":
		
		$consulta_perfil = new Controlador_Perfil();
		$mConsulta_perfil = new Modelo_Perfil($consulta_perfil);
		$mConsulta_perfil->buscar_Perfil($_REQUEST['Nombre_perfil']);
		$mConsulta_perfil->desconectarBD();

		$namePE = $consulta_perfil->get_Nombre();

		echo "<div class='CSSTableGenerator'><table>
					<tr>
					  <td ><strong>Perfil: ".$namePE."</strong></td>
					 
					</tr></table></div><br><br><br>";


		echo "<div class='CSSTableGenerator'><table>
					<tr>
					   <td colspan='3'><strong>Permiso</strong></td>
					  
					 
					</tr>
					 
					<tr>
					  <td>Sistema</td>";

					  if($consulta_perfil->get_PermisoSistema()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";		

					echo"
					</tr>
					 
					<tr>
					  <td>Perfiles</td>";

					  if($consulta_perfil->get_PermisoPerfiles()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";

					echo"
					</tr>
					 
					<tr>
					  <td>Productos</td>";
					  if($consulta_perfil->get_PermisoProductos()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";
	
					  
					echo"  
					</tr>

					<tr>
					  <td>Inventario</td>";
					  if($consulta_perfil->get_PermisoInventario()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";

					 echo" 
					</tr>

					<tr>
					  <td>Facturacion</td>";
					  if($consulta_perfil->get_PermisoFacturacion()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";

					 echo"
					</tr>

					<tr>
					  <td>Reportes</td>";
					  if($consulta_perfil->get_PermisoReportes()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";
						
					 echo"
					</tr>

					<tr>					  
					  <td colspan='2'><br></td>
					</tr>

					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>
					  <input type='submit' name='editarP' class='login login-submit' value='Editar perfil'>
					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>
					  <input type='reset' name='borrarP' class='login login-submit' value='Eliminar perfil'>
					  </td>
					</tr>

			</table></div>";
		echo"</fomr>";	
break;		
default:
echo "<h1><b>Bienvenido, ".$c_usuario->get_Nombres().".</b></h1>";
}


?>
</div>



</body>
</html>