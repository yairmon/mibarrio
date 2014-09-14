<html>
<head>
<title>Mi Barrio</title>
</head>
<body>
<form action="Contra_Validar2.php" method="post">
	<?php
	//Esto se encarga de revisar si el usuario existe
	//si existe, llama a Contra_Validar2 para que muestre la contraseña

		include 'Controlador_Logueo.php';
		include 'Modelo_Logueo.php';
		
		$controlador = new Controlador_Logueo();
		$validar = new Modelo_Logueo($controlador);
		//$usuario = new Contolador_Usuario();

		$usuario = $_REQUEST['user'];

		$validar->pregunta_Usuario($usuario);
		echo '<br>Usuario: <input type="text" name="usua" value="'.$usuario.'" readonly>';

		$pregunta = $controlador->get_Pregunta();	
		if ($pregunta=="")
			header("Location: Contra.php?error=1");
		else{
			echo "<br>La pregunta es: ";
			echo '<input type="text" name="pregu" value="'.$pregunta.'" readonly>';
			echo "<br>Respuesta:";
			echo '<input type="text" name="respues" placeholder="respuesta">';
		}

	?>
<br>

<input type="submit" name="aceptar" value="Aceptar">
	

</form>

</div>

</body>
</html>