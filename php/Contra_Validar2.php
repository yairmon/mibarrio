<html>
<head>
<title>Mi Barrio</title>
</head>
<body>
	<?php

		include 'Modelo_Logueo.php';
		
		$validar = new Modelo_Logueo();

		$usuario = $_REQUEST['usua'];
		$pregunta = $_REQUEST['pregu'];
		$respuesta = $_REQUEST['respues'];
		$contra = $validar->restaurar_Contra($usuario,$pregunta,$respuesta);
		if ($contra=="") 
			header("Location: Contra_Validar.php?error=1");
		else{
			echo "<p>Su contrase&ntilde;a es:<br>$contra";
			echo '<p><a href="../index.php">Regresar</a>';
		}

		/*

		echo "<br>Usuario: $usuario";

		$pregunta = $controlador->get_Pregunta();	
			echo "<br>La pregunta es: ";
			echo '<input type="text" name="pregu" placeholder="'.$pregunta.'" disabled>';
			echo "<br>Respuesta:";
			echo '<input type="text" name="respues" placeholder="respuesta">';
		}*/

	?>
	

</form>

</div>

</body>
</html>