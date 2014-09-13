<html>
<head>
<title>MiBarrio</title>
</head>
<body>
<form action="validacion.php" method="post">
Usuario:
<input type="text" name="user"><br>
Contrase&ntilde;a:
<input type="text" name="pass"><br>
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

<input type="submit" value="Ingresar">
</form>
</body>
</html>

