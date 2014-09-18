<html>
<head>
<title>Recuperar Contrase&ntilde;a</title>
<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>
<body>



<div class="login-card">
	<h1>Recuperar contrase&ntilde;a</h1><br>
	<form action="Contra_Validar.php" method="post">
		Documento:
		<input type="text" name="documento" placeholder="Numero de documento" required="required">
		<?php
			{
				if (isset($_REQUEST['error']))
					echo "<br>Datos inv&aacute;lidos";
			}
		?>
		<p>
		<input type="submit" name="login" class="login login-submit" value="Solicitar">
		&nbsp;&nbsp;<a href = "../index.php">Regresar </a>
	</form>
</div>
			
			

</body>
</html>