<html>
<head>
<title>Mi Barrio</title>
<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>
<body>

<div class="login-card">
	<h1>Recuperar contrase&ntilde;a</h1><br>
	<form action="Contra_Validar2.php" method="post">
		<?php
		//Esto se encarga de revisar si el usuario existe
		//si existe, llama a Contra_Validar2 para que muestre la contraseña

			include 'Controlador_Logueo.php';
			include 'Modelo_Logueo.php';
			
			$controlador = new Controlador_Logueo();
			$validar = new Modelo_Logueo($controlador);

			$documento = $_REQUEST['documento'];

			$pregunta = $validar->pregunta_Usuario($documento);
			echo '<br>Documento: <input type="text" name="documento" value="'.$documento.'" readonly>';

			if ($pregunta=="")
				header("Location: Contra.php?error=1");
			else{
					echo "<br>La pregunta es: ";
					echo '<input type="text" name="pregu" value="'.$pregunta.'" readonly>';
					echo "<br>Respuesta:";
					echo '<input type="text" name="respues" placeholder="respuesta">';
			}
			if (isset($_REQUEST['error']))
				echo "<h1>La respuesta es incorrecta</h1><br>";

		?>
	<br>

		<input type="submit" name="aceptar" class="login login-submit" value="Aceptar">
		

	</form>


</div>
</body>
</html>