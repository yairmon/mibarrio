<html>
<head>
<title>Mi Barrio</title>
<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>
<body>

<div class="login-card">

	<?php

		include 'Modelo_Logueo.php';
		
		$validar = new Modelo_Logueo();

		$documento = $_REQUEST['documento'];
		$pregunta = $_REQUEST['pregu'];
		$respuesta = $_REQUEST['respues'];
		$contra = $validar->restaurar_Contra($documento,$pregunta,$respuesta);
		if ($contra=="") 
			header("Location: Contra_Validar.php?error=1");
		elseif($contra=="NOt"){
			echo '<b>La respuesta est&aacute; mal escrita</b>';
			echo '<p><a href="../index.php">Regresar</a>';
		}
		else{
			echo "<p>Su contrase&ntilde;a es:<p>$contra";
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
	


</div>

</body>
</html>