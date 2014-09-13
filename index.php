<html>
<head>
<title>Mi Barrio</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>


<div class="login-card">
	<h1>Mi Barrio</h1><br>

			<form action="php/validacion.php" method="post">
			Usuario:
			<input type="text" name="user" placeholder="Nombre de usuario" required="required">
			Contrase&ntilde;a:
			<input type="password" name="pass" placeholder="Contrase&ntilde;a" required="required">
			<input type="submit" name="login" class="login login-submit" value="Ingresar">
			<?php
{
if (isset($_REQUEST['error']))
echo "Los datos no son v&aacute;lidos<br>";
elseif (isset($_REQUEST['error2']))
echo "Ingrese un usuario<br>";
elseif (isset($_REQUEST['error3']))
echo "Ingrese una contrase&ntilde;a<br>";
}
?>
			</form>
			
	<div class="login-help">
    <a href="#">Olvid&eacute; mi contrase&ntilde;a</a>
	</div>	
</div>

</body>
</html>

