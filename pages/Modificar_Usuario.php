<?php

	include ("perfil.php"); 

	$numero_error=$_REQUEST['gestion'];
	if($c_perfil->get_PermisoSistema())
		$m_usuario->buscar_Usuario2($numero_error);
	//else $documento = $c_usuario->get_Nid();


echo"<div class='contenido'>";
switch ($numero_error){ 
 default:
 	//todo lo de Modificar el usuario
 	$_perfi = $c_usuario->get_Perfil();
 	/*if($c_perfil->get_PermisoSistema()){
 		echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?perfi=0' method='post'>";
 	}else*/ echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?doc=".$c_usuario->get_Nid()."' method='post'>";

		echo "<div class='CSSTableGenerator' >
                <table >
                	<tr>
                        <td colspan='2'>
                            Modificar Usuario
                        </td>
                     <tr> 

                    <tr>
                        <td>
                            Documento:
                        </td>
                        <td >";
                         echo "<input type='text' name='n_id' value='".$c_usuario->get_Nid()."' placeholder='Documento' required='required' maxlength=15 />";
                            echo "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombres:
                        </td>
                        <td>
                        	<input type='text' name='nom' value='".$c_usuario->get_Nombres()."' placeholder='Nombres' required='required' maxlength=30/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Apellidos:
                        </td>
                        <td>
                        	<input type='text' name='apell' value='".$c_usuario->get_Apellidos()."' placeholder='Apellidos' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Usuario:
                        </td>
                        <td>
                        	<input type='text' name='usu' value='".$c_usuario->get_Usuario()."' placeholder='Usuario' required='required' maxlength=8/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                        	<input type='password' name='pass' value='".$c_usuario->get_Password()."' placeholder='Password' required='required' maxlength=8/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Pregunta:
                        </td>
                        <td>
                        	<input type='text' name='pregun' value='".$c_usuario->get_Pregunta()."' placeholder='Pregunta' required='required' maxlength=150/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Respuesta:
                        </td>
                        <td>
                        	<input type='text' name='respues' value='".$c_usuario->get_Respuesta()."' placeholder='Respuesta' required='required' maxlength=150/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Tipo Documento:
                        </td>
                        <td>
                        	<input type='text' name='tipo_id' value='".$c_usuario->get_TipoId()."' placeholder='Tipo Documento' required='required' maxlength=5/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Ciudad:
                        </td>
                        <td>
                        	<input type='text' name='ciud' value='".$c_usuario->get_Ciudad()."' placeholder='Ciudad' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Direccion:
                        </td>
                        <td>
                        	<input type='text' name='dire' value='".$c_usuario->get_Direccion()."' placeholder='Direccion' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Edad:
                        </td>
                        <td>
                        	<input type='text' name='_edad' value='".$c_usuario->get_Edad()."' placeholder='Edad' required='required' maxlength=3/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Foto:
                        </td>
                        <td>
                        	<input type='text' name='fot' value='".$c_usuario->get_Foto()."' placeholder='Foto' required='required' maxlength=200/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Telefono:
                        </td>
                        <td>
                        	<input type='text' name='celu' value='".$c_usuario->get_Celular()."' placeholder='Telefono' required='required' maxlength=10/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Correo Electronico:
                        </td>
                        <td>
                        	<input type='text' name='e_mail' value='".$c_usuario->get_Email()."' placeholder='Correo Electronico' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Genero:
                        </td>
                        <td>
                        	<input type='text' name='gene' value='".$c_usuario->get_Genero()."' placeholder='Genero' required='required' maxlength=1/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Perfil (Actual: "; echo $c_usuario->get_Perfil()."):
                        </td>";
                        //Aqui el algoritmo para hacer un combobox para los perfiles
                        $arr_perfiles = $m_perfil->mostrar_Todos();
                        $tam_perfiles = count($arr_perfiles);
                        $combobit = "";
                        for($i = 0; $i < $tam_perfiles; $i++){
                        	if($c_usuario->get_Perfil() === $arr_perfiles[$i][0]){
                        		$_perfi = $arr_perfiles[$i][0];
                        		$combobit .=" <option value='".$arr_perfiles[$i][0]."' selected>".$arr_perfiles[$i][0]."</option>";
                        	}
                        	else $combobit .=" <option value='".$arr_perfiles[$i][0]."'>".$arr_perfiles[$i][0]."</option>";
                        }
                        if($c_perfil->get_PermisoSistema())
                        	echo "<td><select name='perfi' class='select'>".$combobit."</select></td>";
                        else echo "<td><select name='perfi' disabled>".$combobit."</select></td>";
                        echo "
                    </tr>
					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>

					  <input type='submit' name='crear' class='login login-submit' value='Actualizar Usuario'>

					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>

					  <input type='reset' name='borrar' class='login login-submit' value='Restaurar Campos'>

					  </td>
					</tr>
                </table>
            </div><br><br>";



		echo"</fomr>";


break;
case 1:
	echo "<h1><i>Se ha modificado el usuario.</i></h1>";
break; 
case 2:
	echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o Documento minimo: 8</div><br>";
break;
}


?>
</div>