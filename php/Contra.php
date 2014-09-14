<html>
<head>
<title>Recuperar Contrase&ntilde;a</title>
</head>
<body>



<form action="Contra_Validar.php" method="post">
	Usuario:
	<input type="text" name="user" placeholder="Nombre de usuario" required="required">
	<?php
		{
			if (isset($_REQUEST['error']))
				echo "El usuario no existe<br>";
		}
	?>
	<input type="submit" name="login" class="login login-submit" value="Solicitar">
</form>
			

</body>
</html>
